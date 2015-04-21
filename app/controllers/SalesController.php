<?php
class SalesController extends BaseController {

    public function __construct() {
        $this->beforeFilter(function() {
            if (Session::get('role_id') != '5') {
                return Redirect::to('/');
            } else {

            }
        });
    }
    public function getSalesDashboard() {
        return View::make('dashboard.sales.sales_main');
    }

    public function getSalesPurchaseApproval(){

        $transaction = DB::table('tb_transaksi')
                        ->join('tb_users','tb_transaksi.id_user','=','tb_users.id_user')
                        ->join('tb_produk','tb_transaksi.id_produk','=','tb_produk.id_produk')
                        ->orderBy('tb_transaksi.created_at','desc')
                        /*->groupBy('tb_transaksi.nomortransaksi')*/
                        ->get(array('tb_transaksi.id_transaksi','tb_transaksi.nomortransaksi','tb_users.name','tb_produk.produk_title','tb_transaksi.id_user','tb_transaksi.id_produk','tb_transaksi.quantity','tb_transaksi.total_harga','tb_transaksi.alamat','tb_transaksi.status','tb_transaksi.created_at'));

        return View::make('dashboard.sales.Product.purchaseapproval')
                        ->with('transaction', $transaction);
    }


    public function postPurchaseNeedApproval(){

        $idtransaksi = tb_transaksi::pluck('id_transaksi');
        $datatransaksi = tb_transaksi::find($idtransaksi);
        $datatransaksi->status='1';
        $datatransaksi->save();


        return Redirect::route('dashboard-sales-purchase-need-approval')
            ->with('success','Transaction has been Forward to Contributor');
        
    } 


/*
|--------------------------------------------------------------------------
| Account Setting
|--------------------------------------------------------------------------
*/
    public function getAccountSetting() {
        return View::make('dashboard.sales.Account.accountsetting');
    }
    public function postUpdateAccountInfoSales($id_user){
        $validator=Validator::make(Input::all(),
            array(
                'name'              =>'required|max:100',
                'email'             =>'required|max:50|email',
                'username'          =>'required|max:50|min:6',
                'user_phone'        =>'numeric|min:10'
            )
        );
        if($validator->fails()){
            return Redirect::route('dashboard-account-setting')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user   = tb_users::find($id_user);
            $name               = $this->xssafe(('name'));
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
                return Redirect::route('dashboard-account-setting')
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
            return Redirect::route('dashboard-account-setting')
                ->withErrors($validator);
        }else{
            $user=tb_users::find($id_user);

            $oldpassword=$this->xssafe(('oldpassword'));
            $newpassword=$this->xssafe(Input::get('newpassword'));

            if(Hash::check($oldpassword,$user->getAuthPassword())){
                $user->password=Hash::make($newpassword);

                if($user->save()){
                    Mail::send('emails.account.accountsetting.passwordmodified',array($user-> name),function($message) use ($user){
                        $message->to($user->email,$user->name)->subject('Password has been changed');
                    });
                    return Redirect::route('dashboard-account-setting')
                        ->with('success','Your password has been changed');
                }
            }else{
                return Redirect::route('dashboard-account-setting')
                    ->with('failed','Your old password incorrect.');
            }

        }
        return Redirect::route('dashboard-account-setting')
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
            return Redirect::route('dashboard-account-setting')
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
                return Redirect::route('dashboard-account-setting')->withErrors($validation)
                    ->withInput();
            }

            $listExt = array('jpg', 'png', 'jpeg', 'gif', 'bmp');

            if(!in_array(strtolower($ext), $listExt)){
                return Redirect::route('dashboard-account-setting')
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
                return Redirect::route('dashboard-account-setting')
                    ->with('success','Profile picture has been changed');
            }
        }else{
            return Redirect::route('dashboard-account-setting')
                ->with('failed','Something wrong, please check file format');
        }


    }

/*
 |--------------------------------------------------------------------------
 | Manage Messages
 |--------------------------------------------------------------------------
*/

   public function getSalesMessagesInbox() {

        $request['id_user_receiver'] = Session::get('user_id');
        $datauser = DB::table('tb_users')
                ->get(array('id_user', 'name', 'username'));
        $datamessage = DB::table('tb_message')
                ->where('id_user_receiver','=', $request)
                ->get(array('id_user_sender','subject','message_post','created_at'));
        $data=[];
        foreach($datamessage as $value) {
            foreach($datauser as $valueuser) {
                if($valueuser->id_user == $value->id_user_sender) {
                    $data[] = array(
                        'name' => $valueuser->name,
                        'subject' => $value->subject,
                        'message' => $value->message_post,
                        'date' => $value->created_at
                    );
                }
            }
        }
        $request['id_user_sender'] = Session::get('user_id');
        $data = array(
            'datamessage' => $data,
        );
        return View::make('dashboard.guest.messages.messages-inbox', $data);
    }

    public function getSalesMessagesSendbox() {

        $request['id_user_sender'] = Session::get('user_id');
        $datauser = DB::table('tb_users')
                ->get(array('id_user', 'name', 'username'));
        $datamessage = DB::table('tb_message')
                ->where('id_user_sender','=', $request)
                ->get(array('id_user_receiver','subject','message_post','created_at'));
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
        return View::make('dashboard.sales.messages.messages-sendbox', $data);
    }

    public function getSalesMessages() {

         $datauser = DB::table('tb_users')
                    ->where('role_id','=','1')
                    ->orWhere('role_id','=','3')
                    ->orWhere('role_id','=','6')
                    ->orWhere('role_id','=','2')
                    ->orWhere('role_id','=','4')
                    ->orderBy('username')
                    ->lists('name','id_user');
        $user=array(''=>'Send to :')+$datauser;
         
        return View::make('dashboard.sales.messages.messages')
            ->with('user',$user);
    }

    public function insertMessage() {
        $request = Input::all();
        $request['id_user_sender'] = Session::get('user_id');        
        
        $validator = Validator::make($request, array(
            "id_user_sender" => "required|exists:tb_users,id_user",
            "id_user_receiver" => "required|exists:tb_users,id_user",            
            "subject" => "required",
            "message_post" => "required"
        ));
        
        if ($validator->fails()) {
            return Redirect::route('dashboard-sales-messages-compose')
                            ->withErrors($validator)
                            ->withInput();
        } else {                       
            $message = tb_message::create(array(
                "id_user_sender" => $request["id_user_sender"],
                "id_user_receiver" => $request["id_user_receiver"],
                "subject" => $request["subject"],
                "message_post" => $request["message_post"]
            ));

            if ($message) {
                return Redirect::route('dashboard-sales-messages-compose')
                                ->with('success', 'Messages Sent');
            }
        }        
    }

}