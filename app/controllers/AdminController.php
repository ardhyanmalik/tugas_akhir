<?php

class AdminController extends BaseController {

    public function __construct() {
        $this->beforeFilter(function() {
            if (Session::get('role_id') != '1') {
                return Redirect::to('/');
            } else {
                
            }
        });
    }
 
    public function getAdminDashboard() {
        return View::make('dashboard.admin.admin_main');
    }
 
    /*
      |--------------------------------------------------------------------------
      | Account Setting
      |--------------------------------------------------------------------------
     */

    public function getAccountSetting() {
    return View::make('dashboard.admin.Account.accountsetting');
}
    public function postUpateAccountInfoAdmin($id_user){
        $validator=Validator::make(Input::all(),
            array(
                'name'              =>'required|max:100',
                'email'             =>'required|max:50|email',
                'username'          =>'required|max:50|min:6',
                'user_phone'        =>'numeric'
            )
        );
        if($validator->fails()){
            return Redirect::route('administrator-account-setting')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user   = tb_users::find($id_user);
            $name               = $this->xssafe(Input::get('name'));
            $username           = $this->xssafe(Input::get('username'));
            $email              = $this->xssafe(Input::get('email'));
            $user_phone         = $this->xssafe(Input::get('user_phone'));
            $user_address       = $this->xssafe(Input::get('user_address'));
            $user_introduction  = $this->xssafe(Input::get('user_introduction'));



            $user-> name                 =$name;
            $user-> username             =$username;
            $user-> email                =$email;
            $user-> user_phone           =$user_phone;
            $user-> user_address         =$user_address;
            $user-> user_introduction    =$user_introduction;
            $user->save();



            if($user){

                Mail::send('emails.account.accountsetting.accountinformation',array('name'=>$name),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Account Information Modified');
                });
                return Redirect::route('administrator-account-setting')
                    ->with('success','Account Information has been updated');
            }


        }
    }
    public function postUpdatePassword($id_user){
        $validator=Validator::make(Input::all(),
            array(
                'oldpassword' =>'required',
                'newpassword'=>'required|min:8',
                'retypepass'=>'required|same:newpassword'
            )
        );

        if($validator->fails()){
            return Redirect::route('administrator-account-setting')
                ->withErrors($validator);
        }else{
            $user=tb_users::find($id_user);

            $oldpassword=$this->xssafe(Input::get('oldpassword'));
            $newpassword=$this->xssafe(Input::get('newpassword'));

            if(Hash::check($oldpassword,$user->getAuthPassword())){
                $user->password=Hash::make($newpassword);

                if($user->save()){
                    Mail::send('emails.account.accountsetting.passwordmodified',array($user-> name),function($message) use ($user){
                        $message->to($user->email,$user->name)->subject('Password has been changed');
                    });
                    return Redirect::route('administrator-account-setting')
                        ->with('success','Your password has been changed');
                }
            }else{
                return Redirect::route('administrator-account-setting')
                    ->with('failed','Your old password incorrect.');
            }

        }
        return Redirect::route('account-change-password')
            ->with('failed','Your password could not be changed.');
    }
    public function postUpdateSocialInfo($id_user){
        $user            = tb_users::find($id_user);
        $facebook_link   = $this->xssafe(Input::get('facebook_link'));
        $twitter_link    = $this->xssafe(Input::get('twitter_link'));
        $google_link     = $this->xssafe(Input::get('google_link'));




        $user-> facebook_link   = $facebook_link;
        $user-> twitter_link    = $twitter_link;
        $user-> google_link     = $google_link;
        $user->save();
        if($user){

            Mail::send('emails.account.accountsetting.sociallink',array(),function($message) use ($user){
                $message->to($user->email,$user->name)->subject('Account Information Modified');
            });
            return Redirect::route('administrator-account-setting')
                ->with('success','Account Information has been updated');
        }


    }
    public function postUpdateProfpict($id_user){

        if(Input::hasFile('user_photo')){
            $files = array('user_photo' => Input::file('user_photo'));
            $rules = array('user_photo'=>'max:2000');

            $ext = Input::file('user_photo')->getClientOriginalExtension();

            $validation = Validator::make($files, $rules);

            if($validation->fails())
            {
                return Redirect::route('administrator-account-setting')->withErrors($validation)
                    ->withInput();
            }

            $listExt = array('jpg', 'png', 'jpeg', 'gif', 'bmp');

            if(!in_array(strtolower($ext), $listExt)){
                return Redirect::route('administrator-account-setting')
                    ->with('failed', 'Please check file format! jpg, png, jpeg, gif, bmp only')
                    ->withInput();
            }

            $pubpath = public_path();
            $directory = $pubpath.'/assets/user_profpic';
            $filename = $id_user.".jpeg";
            Input::file('user_photo')->move($directory, $filename);

            $user=tb_users::find($id_user);
            $user->user_photo   =asset('/assets/user_profpic/'.$filename);
            $user->save();

            if($user){

                Mail::send('emails.account.accountsetting.profilepict',array(),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Account Information Modified');
                });
                return Redirect::route('administrator-account-setting')
                    ->with('success','Profile picture has been changed');
            }
        }else{
            return Redirect::route('administrator-account-setting')
                ->with('failed','Something wrong, please check file format');
        }


    }


    /*
      |--------------------------------------------------------------------------
      | Manage Messages
      |--------------------------------------------------------------------------
     */

    public function getDataMessages($id_messages){

        /*$request['id_user_receiver']    = Session::get('user_id');
        $messages   = DB::table('tb_message')
                            ->join('tb_users','tb_message.id_user_sender','=','tb_users.id_user')
                            ->get('tb_message.id_messages','tb_message.id_user_sender','tb_users.name','tb_message.messages_post');*/

        $request['id_user_receiver']    = Session::get('user_id');
        $datauser = DB::table('tb_users')
                ->get(array('id_user', 'name', 'username','user_photo'));
        $datamessage = DB::table('tb_message')
                ->where('id_user_receiver','=', $request)
                ->get(array('id_user_sender','subject','message_post','created_at'));
        $data=[];
        foreach($datamessage as $value) {
            foreach($datauser as $valueuser) {
                if($valueuser->id_user == $value->id_user_sender) {
                    $data[] = array(
                        'photo' => $valueuser->user_photo,
                        'name' => $valueuser->name,
                        'subject' => $value->subject,
                        'message' => $value->message_post,
                        'date' => $value->created_at
                    );
                }
            }
        }
         $data = array(
            'datamessage' => $data,
        );
        return View::make('dashboard.admin.messages.messages-open',$data);

    }
    public function getAdminMessagesInbox() {

        $request['id_user_receiver'] = Session::get('user_id');
        $datauser = DB::table('tb_users')
                ->get(array('id_user', 'name', 'username','user_photo'));
        $datamessage = DB::table('tb_message')
                ->where('id_user_receiver','=', $request)
                ->get(array('id_user_sender','subject','message_post','created_at'));
        $data=[];
        foreach($datamessage as $value) {
            foreach($datauser as $valueuser) {
                if($valueuser->id_user == $value->id_user_sender) {
                    $data[] = array(
                        'photo' => $valueuser->user_photo,
                        'name' => $valueuser->name,
                        'subject' => $value->subject,
                        'message' => $value->message_post,
                        'date' => $value->created_at
                    );
                }
            }
        }
        $data = array(
            'datamessage' => $data,
        );
        return View::make('dashboard.admin.messages.messages-inbox', $data);
    }
 
    public function getAdminMessagesSendbox() {

        $request['id_user_sender'] = Session::get('user_id');
        $datauser = DB::table('tb_users')
                ->get(array('id_user', 'name', 'username'));
        $datamessage = DB::table('tb_message')
                ->where('id_user_sender','=', $request)
                ->get(array('id_message','id_user_receiver','subject','message_post','created_at'));
        $data=[];
        foreach($datamessage as $value) {
            foreach($datauser as $valueuser) {
                if($valueuser->id_user == $value->id_user_receiver) {
                    $data[] = array(
                        'name' => $valueuser->name,
                        'subject' => $value->subject,
                        'message' => $value->message_post,
                        'date' => $value->created_at
                    );
                }
            } 
        } 
        $data = array(
            'datamessage' => $data,
        );
        return View::make('dashboard.admin.messages.messages-sendbox', $data);
    }

    public function getAdminMessages() {

        $datauser = DB::table('tb_users')
                    ->where('role_id','=','2')
                    ->orWhere('role_id','=','5')
                    ->orWhere('role_id','=','6')
                    ->orderBy('username')
                    ->lists('name','id_user');
        $user=array(''=>'Send to :')+$datauser;
        return View::make('dashboard.admin.messages.messages')
              ->with('user',$user);
    }
 
    public function insertMessage() {

        $request = Input::all();
        $request['id_user_sender'] = Auth::user()->id_user;     
        
        $validator = Validator::make($request, array(
                "id_user_sender"        => "required|exists:tb_users,id_user",
                "id_user_receiver"      => "required|exists:tb_users,id_user",            
                "subject"               => "required",
                "message_post"          => "required"
        ));
        
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-messages-compose')
                            ->withErrors($validator)
                            ->withInput();
        } else {                       
            $message = tb_message::create(array(
                "id_user_sender"        => $request["id_user_sender"],
                "id_user_receiver"      => $request["id_user_receiver"],
                "subject"               => $request["subject"],
                "message_post"          => $request["message_post"]
            ));

            if ($message) {
                return Redirect::route('dashboard-administrator-messages-compose')
                                ->with('success', 'Messages Sent');
            }
        }        
    }       


    /*
      |--------------------------------------------------------------------------
      | Manage Products
      |--------------------------------------------------------------------------
     */

    public function getProductList() {
        return View::make('dashboard.admin.product.product-list');
    }

    public function getCategoriesList() {
        return View::make('dashboard.admin.product.categories-list');
    }

    /*
      |--------------------------------------------------------------------------
      | Manage Users
      |--------------------------------------------------------------------------
     */
    /* Administrator */

    public function getDataMasterAdmin() {
        $dataadmin = DB::table('tb_users')
                ->where('role_id', '=', '1')
                ->get(array('id_user', 'name', 'username', 'email', 'status_user'));
        return View::make('dashboard.admin.DataMaster.datamasteradmin')
                        ->with('dataadmin', $dataadmin);
    }

    public function postCreateAdministrator() {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'email' => 'required|max:50|email|unique:tb_users',
                    'username' => 'required|max:50|min:6|unique:tb_users',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-admin')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));

            $code = str_random(60);

            $user = tb_users::create(array(
                        'id_contributor' => '',
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'role_id' => 1,
                        'status_user' => 0
            ));

            if ($user) {

                Mail::send('emails.account.active.adminactive', array('link' => URL::route('account-active', $code), 'name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Active your account');
                });
                return Redirect::route('dashboard-administrator-datamaster-admin')
                                ->with('success', 'New Administrator Account has been created. Please check email to activated it');
            }
        }
    }

    public function postEditAdministrator($id_user) {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'username' => 'required|max:50|min:6',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-admin')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user       = tb_users::find($id_user);
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $user->id_contributor = '';
            $user->name = $name;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role_id = 1;
            $user->status_user = 1;
            $user->save();

            ;

            if ($user) {

                Mail::send('emails.account.edited.adminedited', array('name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Account has been modified');
                });
                return Redirect::route('dashboard-administrator-datamaster-admin')
                                ->with('success', 'An account information has been edited, system already sent email to owner as notification');
            }
        }
    }

    public function postBannedAdministrator($id_user) {
        $banneduser = tb_users::find($id_user);
        $banneduser->status_user = 2;
        $banneduser->save();
        if ($banneduser) {
            Mail::send('emails.account.banned.administratorbanned', array('link' => URL::route('account-create-account'), $banneduser->name), function($message) use ($banneduser) {
                $message->to($banneduser->email, $banneduser->name)->subject('Banned Account');
            });
            return Redirect::route('dashboard-administrator-datamaster-admin')
                            ->with('success', 'Administrator Account has been Banned.');
        }
    }

    public function postDeleteAdministrator($id_user) {
        $usermail = tb_users::find($id_user);
        if ($usermail) {
            Mail::send('emails.account.deleted.administratordeleted', array($usermail->name), function($message) use ($usermail) {
                $message->to($usermail->email, $usermail->name)->subject('Deleted Account');
            });
        }

        $userdelete = tb_users::find($id_user)->delete();
        return Redirect::route('dashboard-administrator-datamaster-admin')
                        ->with('success', 'Administrator has been delete an account and system already sent an email as notification for user');
    }

    /* Moderator */

    public function getDataMasterModerator() {
        $datamoderator = DB::table('tb_users')
                ->where('role_id', '=', '2')
                ->get(array('id_user', 'name', 'username', 'email', 'status_user'));
        return View::make('dashboard.admin.DataMaster.datamastermoderator')
                        ->with('datamoderator', $datamoderator);
    }

    public function postCreateModerator() {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'username' => 'required|max:50|min:6|unique:tb_users',
                    'email' => 'required|max:50|email|unique:tb_users',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-moderator')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));
            $code = str_random(60);

            $user = tb_users::create(array(
                        'id_contributor' => '',
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'role_id' => 2,
                        'status_user' => 0
            ));
            if ($user) {

                Mail::send('emails.account.active.moderatoractive', array('link' => URL::route('account-active', $code), 'name' => $name), function($message)use ($user) {
                    $message->to($user->email, $user->name)->subject('Active your Account');
                });
                return Redirect::route('dashboard-administrator-datamaster-moderator')
                                ->with('success', 'New Moderatator Account has been created. Please check email to activated it');
            }
        }
    }

    public function postEditModerator($id_user) {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'id_contributor' => 'required|max15',
                    'username' => 'required|max:50|min:6',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-admin')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user           = tb_users::find($id_user);
            $name           = $this->xssafe(Input::get('name'));
            $id_contributor = $this->xssafe(Input::get('id_contributor'));
            $email          = $this->xssafe(Input::get('email'));
            $username       = $this->xssafe(Input::get('username'));
            $password       = $this->xssafe(Input::get('password'));


            $user->id_contributor = $id_contributor;
            $user->name = $name;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role_id = 1;
            $user->status_user = 1;
            $user->save();

            ;

            if ($user) {

                Mail::send('emails.account.edited.moderatoredited', array('name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Account has been modified');
                });
                return Redirect::route('dashboard-administrator-datamaster-admin')
                                ->with('success', 'An account information has been edited, system already sent email to owner as notification');
            }
        }
    }

    public function postDeleteModerator($id_user) {
        $usermail = tb_users::find($id_user);
        if ($usermail) {
            Mail::send('emails.account.deleted.moderatordeleted', array($usermail->name), function($message) use ($usermail) {
                $message->to($usermail->email, $usermail->name)->subject('Deleted Account');
            });
        }

        $userdelete = tb_users::find($id_user)->delete();
        return Redirect::route('dashboard-administrator-datamaster-moderator')
                        ->with('success', 'Administrator has been delete an account and system already sent an email as notification for user');
    }

    public function postBannedModerator($id_user) {
        $banneduser = tb_users::find($id_user);

        $banneduser->status_user = 2;
        $banneduser->save();
        if ($banneduser) {
            Mail::send('emails.account.banned.moderatorbanned', array('link' => URL::route('account-create-account'), $banneduser->name), function($message) use ($banneduser) {
                $message->to($banneduser->email, $banneduser->name)->subject('Banned Account');
            });
            return Redirect::route('dashboard-administrator-datamaster-moderator')
                            ->with('success', 'Moderator Account has been Banned.');
        }
    }

    /* Contributor */


    public function getDataMasterContributor() {

        $datacontributor = DB::table('tb_users')
                ->where('role_id', '=', '3')
                ->get(array('id_user', 'id_contributor', 'name', 'username', 'email', 'status_user'));
        return View::make('dashboard.admin.DataMaster.datamastercontributor')
                        ->with('datacontributor', $datacontributor);
    }

    public function postCreateContributor() {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'id_contributor' => 'required|max:20|unique:tb_users',
                    'email' => 'required|max:50|email|unique:tb_users',
                    'username' => 'required|max:50|min:6|unique:tb_users',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                    )
        );
        if ($validator->fails()) {

            return Redirect::route('dashboard-administrator-datamaster-contributor')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name           = $this->xssafe(Input::get('name'));
            $id_contributor = $this->xssafe(Input::get('id_contributor'));
            $email          = $this->xssafe(Input::get('email'));
            $username       = $this->xssafe(Input::get('username'));
            $password       = $this->xssafe(Input::get('password'));

            $code = str_random(60);
            $user = tb_users::create(array(
                        'id_contributor' => $id_contributor,
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'role_id' => 3,
                        'status_user' => 0
            ));

            if ($user) {
                Mail::send('emails.account.active.contributoractive', array('link' => URL::route('account-active', $code), 'name' => $name), function($message)use($user) {
                    $message->to($user->email, $user->name)->subject('Active your account');
                });
                return Redirect::route('dashboard-administrator-datamaster-contributor')
                                ->with('success', 'New Contributor Account has been created. Please check email to activated it');
            }
        }
    }

    public function postEditContributor($id_user) {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-contributor')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user           = tb_users::find($id_user);
            $name           = $this->xssafe(Input::get('name'));
            $id_contributor = $this->xssafe(Input::get('id_contributor'));
            $email          = $this->xssafe(Input::get('email'));
            $username       = $this->xssafe(Input::get('username'));
            $password       = $this->xssafe(Input::get('password'));

            $user->id_contributor = $id_contributor;
            $user->name = $name;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role_id = 3;
            $user->status_user = 1;
            $user->save();

            if($user){

                Mail::send('emails.account.edited.contributoredited',array('name'=>$name),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Account has been modified');
                });
                return Redirect::route('dashboard-administrator-datamaster-contributor')
                                ->with('success', 'An account information has been edited, system already sent email to owner as notification');
            }
        }
    }

    public function postBannedContributor($id_user) {
        $banneduser = tb_users::find($id_user);
        $banneduser->status_user = 2;
        $banneduser->save();
        if ($banneduser) {
            Mail::send('emails.account.banned.moderatorbanned', array('link' => URL::route('account-create-account'), $banneduser->name), function($message) use ($banneduser) {
                $message->to($banneduser->email, $banneduser->name)->subject('Banned Account');
            });
            return Redirect::route('dashboard-administrator-datamaster-contributor')
                            ->with('success', 'Contributor Account has been Banned.');
        }
    }
 
    public function postDeleteContributor($id_user) {
        $usermail = tb_users::find($id_user);
        if ($usermail) {
            Mail::send('emails.account.deleted.Contributordeleted', array($usermail->name), function($message) use ($usermail) {
                $message->to($usermail->email, $usermail->name)->subject('Deleted Account');
            });
        }
        $userdelete = tb_users::find($id_user)->delete();
        return Redirect::route('dashboard-administrator-datamaster-contributor')
                        ->with('success', 'Administrator has been delete an account and system already sent an email as notification for user');
    }

    /* Guest */

    public function getDataMasterGuest() {
        $dataguest = DB::table('tb_users')
                ->where('role_id', '=', '4')
                ->get(array('id_user', 'name', 'username', 'email', 'status_user'));
        return View::make('dashboard.admin.DataMaster.datamasterguest')
                        ->with('dataguest', $dataguest);
    }

    public function postCreateGuest() {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'email' => 'required|max:50|email|unique:tb_users',
                    'username' => 'required|max:50|min:6|unique:tb_users',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-guest')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $code = str_random(60);

            $user = tb_users::create(array(
                        'id_contributor' => '',
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'role_id' => 4,
                        'status_user' => 0
            ));

            if ($user) {

                Mail::send('emails.account.active.guestactive', array('link' => URL::route('account-active', $code), 'name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Active your account');
                });
                return Redirect::route('dashboard-administrator-datamaster-guest')
                                ->with('success', 'New Administrator Account has been created. Please check email to activated it');
            }
        }
    }

    public function postEditGuest($id_user) {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'username' => 'required|max:50|min:6',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-guest')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user       = tb_users::find($id_user);
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $user->id_contributor = '';
            $user->name = $name;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role_id = 4;
            $user->status_user = 1;
            $user->save();

            if ($user) {

                Mail::send('emails.account.edited.guestedited', array('name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Account has been modified');
                });
                return Redirect::route('dashboard-administrator-datamaster-guest')
                                ->with('success', 'An account information has been edited, system already sent email to owner as notification');
            }
        }
    }

    public function postBannedGuest($id_user) {
        $banneduser = tb_users::find($id_user);
        $banneduser->status_user = 2;
        $banneduser->save();

        if ($banneduser) {
            Mail::send('emails.account.banned.moderatorbanned', array($banneduser->name), function($message) use ($banneduser) {
                $message->to($banneduser->email, $banneduser->name)->subject('Banned Account');
            });
            return Redirect::route('dashboard-administrator-datamaster-guest')
                            ->with('success', 'An Account has been Banned.');
        }
    }

    public function postDeleteGuest($id_user) {
        $usermail = tb_users::find($id_user);
        if ($usermail) {
            Mail::send('emails.account.deleted.guestdeleted', array($usermail->name), function($message) use ($usermail) {
                $message->to($usermail->email, $usermail->name)->subject('Deleted Account');
            });
        }

        $userdelete = tb_users::find($id_user)->delete();
        return Redirect::route('dashboard-administrator-datamaster-guest')
                        ->with('success', 'Administrator has been delete an account and system already sent an email as notification for user');
    }

    /*Sales*/
    public function getDataMasterSales(){

        $datasales = DB::table('tb_users')
                ->where('role_id', '=', '5')
                ->get(array('id_user', 'name', 'username', 'email', 'status_user'));
        return View::make('dashboard.admin.DataMaster.datamastersales')
                        ->with('datasales', $datasales);
    }

   public function postCreateSales() {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'email' => 'required|max:50|email|unique:tb_users',
                    'username' => 'required|max:50|min:6|unique:tb_users',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-sales')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $code = str_random(60);

            $user = tb_users::create(array(
                        'id_contributor' => '',
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'role_id' => 4,
                        'status_user' => 0
            ));

            if ($user) {

                Mail::send('emails.account.active.guestactive', array('link' => URL::route('account-active', $code), 'name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Active your account');
                });
                return Redirect::route('dashboard-administrator-datamaster-sales')
                                ->with('success', 'New Administrator Account has been created. Please check email to activated it');
            }
        }
    }


    public function postEditSales($id_user) {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'username' => 'required|max:50|min:6',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-sales')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user       = tb_users::find($id_user);
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $user->id_contributor = ' ';
            $user->name = $name;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role_id = 5;
            $user->status_user = 1;
            $user->save();

            ;

            if ($user) {

                Mail::send('emails.account.edited.contributoredited', array('name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Account has been modified');
                });
                return Redirect::route('dashboard-administrator-datamaster-sales')
                                ->with('success', 'An account information has been edited, system already sent email to owner as notification');
            }
        }
    }

    public function postBannedSales($id_user) {
        $banneduser = tb_users::find($id_user);
        $banneduser->status_user = 2;
        $banneduser->save();
        if ($banneduser) {
           Mail::send('emails.account.banned.moderatorbanned', array('link' => URL::route('account-create-account'), $banneduser->name), function($message) use ($banneduser) {
                $message->to($banneduser->email, $banneduser->name)->subject('Banned Account');
            });
            return Redirect::route('dashboard-administrator-datamaster-sales')
                            ->with('success', 'Payment Account has been Banned.');
        }
    }

    public function postDeleteSales($id_user) {
        $usermail = tb_users::find($id_user);
        if ($usermail) {
            Mail::send('emails.account.deleted.Contributordeleted', array($usermail->name), function($message) use ($usermail) {
                $message->to($usermail->email, $usermail->name)->subject('Deleted Account');
            });
        }
        $userdelete = tb_users::find($id_user)->delete();
        return Redirect::route('dashboard-administrator-datamaster-sales')
                        ->with('success', 'Sales has been delete an account and system already sent an email as notification for user');
    }


    /*Payment*/
    public function getDataMasterPayment(){

        $datapayment = DB::table('tb_users')
                ->where('role_id', '=', '6')
                ->get(array('id_user', 'name', 'username', 'email', 'status_user'));
        return View::make('dashboard.admin.DataMaster.datamasterpayment')
                        ->with('datapayment', $datapayment);
    }

    public function postCreatePayment() {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'email' => 'required|max:50|email|unique:tb_users',
                    'username' => 'required|max:50|min:6|unique:tb_users',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-payment')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $code = str_random(60);

            $user = tb_users::create(array(
                        'id_contributor' => '',
                        'name' => $name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'role_id' => 6,
                        'status_user' => 0
            ));

            if ($user) {

                Mail::send('emails.account.active.guestactive', array('link' => URL::route('account-active', $code), 'name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Active your account');
                });
                return Redirect::route('dashboard-administrator-datamaster-sales')
                                ->with('success', 'New Administrator Account has been created. Please check email to activated it');
            }
        }
    }

    public function postEditPayment($id_user) {
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required|max:100',
                    'username' => 'required|max:50|min:6',
                    'password' => 'required|min:8',
                    'retypepassword' => 'required|same:password'
                )
        );
        if ($validator->fails()) {
            return Redirect::route('dashboard-administrator-datamaster-payment')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user       = tb_users::find($id_user);
            $name       = $this->xssafe(Input::get('name'));
            $email      = $this->xssafe(Input::get('email'));
            $username   = $this->xssafe(Input::get('username'));
            $password   = $this->xssafe(Input::get('password'));


            $user->id_contributor = '';
            $user->name = $name;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->role_id = 6;
            $user->status_user = 1;
            $user->save();

            ;

            if ($user) {

                Mail::send('emails.account.edited.contributoredited', array('name' => $name), function($message) use ($user) {
                    $message->to($user->email, $user->name)->subject('Account has been modified');
                });
                return Redirect::route('dashboard-administrator-datamaster-payment')
                                ->with('success', 'An account information has been edited, system already sent email to owner as notification');
            }
        }
    }

    public function postBannedPayment($id_user) {
        $banneduser = tb_users::find($id_user);
        $banneduser->status_user = 2;
        $banneduser->save();
        if ($banneduser) {
           Mail::send('emails.account.banned.moderatorbanned', array('link' => URL::route('account-create-account'), $banneduser->name), function($message) use ($banneduser) {
                $message->to($banneduser->email, $banneduser->name)->subject('Banned Account');
            });
            return Redirect::route('dashboard-administrator-datamaster-payment')
                            ->with('success', 'Payment Account has been Banned.');
        }
    }

    public function postDeletePayment($id_user) {
        $usermail = tb_users::find($id_user);
        if ($usermail) {
            Mail::send('emails.account.deleted.Contributordeleted', array($usermail->name), function($message) use ($usermail) {
                $message->to($usermail->email, $usermail->name)->subject('Deleted Account');
            });
        }
        $userdelete = tb_users::find($id_user)->delete();
        return Redirect::route('dashboard-administrator-datamaster-payment')
                        ->with('success', 'Payment has been delete an account and system already sent an email as notification for user');
    }


    /*
   |--------------------------------------------------------------------------
   | Security Methods
   |--------------------------------------------------------------------------
   |
*/

    public function xssafe($data,$encoding='UTF-8')
    {
        return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
    }

    public function xecho($data)
    {
        echo xssafe($data);
    }


}

