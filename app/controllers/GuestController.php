<?php
 
class GuestController extends BaseController {
    public function __construct()
    {
        $this->beforeFilter(function()
        {
            if(Session::get('role_id')!='4'){
                return Redirect::to('/home');
            }else{

            }
        });
    } 
    public function getGuestDashboard(){
        return View::make('dashboard.guest.guest_main');
    } 
    /* 
     |--------------------------------------------------------------------------
     | Account Setting
     |--------------------------------------------------------------------------
    */
    public function getAccountSetting(){
        return View::make('dashboard.guest.Account.accountsetting');
    }
    public function postUpdateAccountInfoGuest($id_user){
        $validator=Validator::make(Input::all(),
            array(
                'name'              =>'required|max:100',
                'email'             =>'required|max:50|email',
                'username'          =>'required|max:50|min:6',
                'user_phone'        =>'numeric'
            )
        );
 
        if($validator->fails()){
            return Redirect::route('guest-account-setting')
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

            $checkerusername=DB::table('tb_users')
                                    ->where('id_user','=',$id_user)->pluck('username');
            if($checkerusername==null){
                $check=DB::table('tb_users')
                        ->where('username','=',$username)->pluck('username');
                if($check==null){
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
                        return Redirect::route('guest-account-setting')
                            ->with('success','Account Information has been updated');
                    }
                }else{
                    return Redirect::route('guest-account-setting')
                        ->with('failed','Username already taken,please try another one');
                }
            }else{
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
                    return Redirect::route('guest-account-setting')
                        ->with('success','Account Information has been updated');
                }
            }
        }
    }

    public function postUpdatePassword($id_user){
        $validator=Validator::make(Input::all(),
            array(
                //'oldpassword' =>'required',
                'newpassword'=>'required|min:8',
                'retypepass'=>'required|same:newpassword'
            )
        );

        if($validator->fails()){
            return Redirect::route('guest-account-setting')
                ->withErrors($validator);
        }else{
            $user=tb_users::find($id_user);

            $oldpassword=$this->xssafe(Input::get('oldpassword'));
            $newpassword=$this->xssafe(Input::get('newpassword'));

            $passcheck=DB::table('tb_users')
                            ->where('id_user','=',$id_user)->pluck('password');
            var_dump($passcheck);
            if($passcheck==null){
                $user->password=Hash::make($newpassword);
                if($user->save()){
                    Mail::send('emails.account.accountsetting.passwordmodified',array($user-> name),function($message) use ($user){
                        $message->to($user->email,$user->name)->subject('Password has been changed');
                    });
                    return Redirect::route('guest-account-setting')
                        ->with('success','Your password has been changed');
                }
            }else{
                if($oldpassword==null){
                    return Redirect::route('guest-account-setting')
                        ->with('failed','Your old password incorrect.');
                }
                else if(Hash::check($oldpassword,$user->getAuthPassword())){
                    $user->password=Hash::make($newpassword);

                    if($user->save()){
                        Mail::send('emails.account.accountsetting.passwordmodified',array($user-> name),function($message) use ($user){
                            $message->to($user->email,$user->name)->subject('Password has been changed');
                        });
                        return Redirect::route('guest-account-setting')
                            ->with('success','Your password has been changed');
                    }
                }else{
                    return Redirect::route('guest-account-setting')
                        ->with('failed','Your old password incorrect.');
                }
            }

        }
        return Redirect::route('guest-account-setting')
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
            return Redirect::route('guest-account-setting')
                ->with('success','Account Information has been updated');
        }
    }
    public function postUpdateProfpict($id_user){

        if(Input::hasFile('user_photo')){
            $files = array('user_photo' => $this->xssafe(Input::file('user_photo')));
            $rules = array('user_photo'=>'max:2000');

            $ext = $this->xssafe(Input::file('user_photo'))->getClientOriginalExtension();

            $validation = Validator::make($files, $rules);

            if($validation->fails())
            {
                return Redirect::route('guest-account-setting')->withErrors($validation)
                    ->withInput();
            }

            $listExt = array('jpg', 'png', 'jpeg', 'gif', 'bmp');

            if(!in_array(strtolower($ext), $listExt)){
                return Redirect::route('guest-account-setting')
                    ->with('failed', 'Please check file format! jpg, png, jpeg, gif, bmp only')
                    ->withInput();
            }

            $pubpath = public_path();
            $directory = $pubpath.'/assets/user_profpic';
            $filename = $id_user.".jpeg";
            $this->xssafe(Input::file('user_photo'))->move($directory, $filename);

            $user=tb_users::find($id_user);
            $user->user_photo   =asset('/assets/user_profpic/'.$filename);
            $user->save();

            if($user){

                Mail::send('emails.account.accountsetting.profilepict',array(),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Account Information Modified');
                });
                return Redirect::route('guest-account-setting')
                    ->with('success','Profile picture has been changed');
            }
        }else{
            return Redirect::route('guest-account-setting')
                ->with('failed','Something wrong, please check file format!');
        }
    }

/*
 |--------------------------------------------------------------------------
 | Manage Messages
 |--------------------------------------------------------------------------
*/

   public function getGuestMessagesInbox() {

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

    public function getGuestMessagesSendbox() {

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
        return View::make('dashboard.guest.messages.messages-sendbox', $data);
    }

    public function getGuestMessages() {
        $datauser = DB::table('tb_users')
                    ->where('role_id','=','1')
                    ->orWhere('role_id','=','5')
                    ->orWhere('role_id','=','6')
                    ->orWhere('role_id','=','2')
                    ->orderBy('username')
                    ->lists('name','id_user');
        $user=array(''=>'Send to :')+$datauser;
        
        return View::make('dashboard.guest.messages.messages')
                ->with('user',$user);
    }

    public function insertMessage() {
        $request = $this->xssafe(Input::all());
        $request['id_user_sender'] = Session::get('user_id');        
        
        $validator = Validator::make($request, array(
            "id_user_sender" => "required|exists:tb_users,id_user",
            "id_user_receiver" => "required|exists:tb_users,id_user",            
            "subject" => "required",
            "message_post" => "required"
        ));
        
        if ($validator->fails()) {
            return Redirect::route('dashboard-guest-messages-compose')
                            ->withErrors($validator)
                            ->withInput();
        } else {                       
            $message = tb_message::create(array(
                "id_user_sender"                => $request["id_user_sender"],
                "id_user_receiver"              => $request["id_user_receiver"],
                "subject"                       => $request["subject"],
                "message_post"                  => $request["message_post"]
            ));

            if ($message) {
                return Redirect::route('dashboard-guest-messages-compose')
                                ->with('success', 'Messages Sent');
            }
        }        
    }



    /*
    |--------------------------------------------------------------------------
    | Manage Product
    |--------------------------------------------------------------------------
   */

    public function getGuestPurchasedProduct(){
        $orderproduct   = DB::table('tb_transaksi')
                            ->join('tb_nomor_transaksi','tb_transaksi.id_nomor_transaksi','=','tb_nomor_transaksi.id_nomor_transaksi')
                            ->join('tb_produk','tb_transaksi.id_produk','=','tb_produk.id_produk')
                            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                            ->where('tb_transaksi.id_user','=',Auth::user()->id_user)
                            ->orderBy('created_at','desc' )
                            ->get(array('tb_transaksi.id_transaksi','tb_produk_detail.id_produk_detail','tb_produk.id_produk','tb_transaksi.total_harga','tb_produk.produk_title','tb_produk_detail.produk_ava','tb_transaksi.status','tb_transaksi.created_at','tb_nomor_transaksi.nomor_transaksi'));


    	return View::make('dashboard.guest.product.purchased-product')
                        ->with('orderproduct', $orderproduct);

    }

    public function getGuestConfirmPayment(){
        return View::make('homepage.homepage_confirm_payment');
    }

  public function postGuestConfirmPayment($id_user){

        $input     = Input::all();
        $validator = Validator::make($input, array(
                        'idtransaction'     => 'required',
                        'bank'              => 'required',
                        'name'              => 'required',
                        'total'             => 'required',
                        'date'              => 'required',
                        'choosebank'        => 'required',
                        'number'            => 'required',
                        'filetransaksi'     => 'required'
        ));
        if ($validator->fails()){
            return Redirect::route('product-transaction-confirm-payment')
                            ->withErrors($validator)
                            ->withInput();
                        
        } else{
            $idtransaction              = Input::get('idtransaction');
            $id_user                    = Input::get($id_user);
            $bank                       = Input::get('bank');
            $name                       = Input::get('name');
            $total                      = Input::get('total');
            $date                       = Input::get('date');
            $choosebank                 = Input::get('choosebank');
            $file_transaksi             = Input::file('file_transaksi');

            $destinationPath        = '/uploads/products/transaksi'.$idtransaction;
            Input::file('file_transaksi')->move($destinationPath); 
           
            $konfirmasi   = tb_konfirmasi::create(array(
                                'id_transaksi'      => $idtransaction,
                                'id_user'           => Auth::user()->id_user,
                                'bankpengirim'      => $bank,
                                'nama_pengirim'     => $name,
                                'bank_tujuan'       => $choosebank,
                                'nominal'           => $total,
                                'file_transaksi'    => asset('/uploads/transaksi'.$idtransaction.'/'.$idtransaction)
            ));

            if($konfirmasi){
                return Redirect::route('product-transaction-confirm-payment')
                                ->with('success','konfirmasi berhasil');
            } 
        }
    }

    public function getReversioning(){
        return View::make('dashboard.guest.product.reversioningproduct');
    }
    public function getSearchProduct(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('tb_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk.version_available','=',1)
            ->where('tb_produk.produk_title', 'LIKE', '%'.$term.'%')
            ->orderBy('tb_produk.updated_at','asc')
            ->get();

        foreach ($queries as $query)
        {
            $results[] = [
                            'id'                => $query->id_produk,
                            'produk_version'    => $query->produk_version,
                            'id_owner'          => $query->id_user,
                            'value'             => $query->produk_title,
                            'owner'             => $query->name,
                            'product_type'      => $query->produk_type,
                            'product_category'  => $query->category_name,
                            'profpict'          => $query->produk_ava
            ];
        }
        return Response::json($results);
    }
    public function postAddVersioning($id_produk){

        $input = Input::all();
        $input['files'] = array_filter($input['productpictures']);
        $n = 0;
        foreach(Request::instance()->file('productpictures') as $file) {
            $input["file$n"] = $file;
            $n += 1;
        }
        $validator=Validator::make($input,
            array(
                'id_produk'             =>'required|numeric',
                'id_owner'              =>'required|numeric',
                'product_title'         =>'required',
                'product_type'          =>'required',
                'product_ava'           =>'required|max:4096',
                'product_category'      =>'required',
                'produk_version'        =>'required',
                'productfile'           =>'required|max:51200|mimes:jpg,jpeg,png,bmp,gif,pdf,rar,zip',
                'files'                 =>'array|min:2|max:5',
                'file0'                 =>'required|max:4096|mimes:jpg,jpeg,png,bmp,gif',
                'file1'                 =>'required|max:4096|mimes:jpg,jpeg,png,bmp,gif',
                'file2'                 =>'max:4096|mimes:jpg,jpeg,png,bmp,gif',
                'file3'                 =>'max:4096|mimes:jpg,jpeg,png,bmp,gif',
                'file4'                 =>'max:4096|mimes:jpg,jpeg,png,bmp,gif',
                'youtubelink'           =>'',
                'productdescription'    =>'required'
            )
        );
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $id_produk                  = $this->xssafe(Input::get('id_produk'));
            $id_owner                   = $this->xssafe(Input::get('id_owner'));
            $id_user                    = Auth::user()->id_user;
            $productcategory            = $this->xssafe(Input::get('product_category'));
            $version_available          = $this->xssafe(Input::get('version_available'));
            $product_title              = $this->xssafe(Input::get('product_title'));
            $product_type               = $this->xssafe(Input::get('product_type'));
            $reversioning_produk_status = 2;
            $product_ava                = $this->xssafe(Input::get('product_ava'));
            $product_file               = Input::file('productfile');
            $product_link               = time().md5($product_title).str_random(60);
            $product_version            = $this->xssafe(Input::get('produk_version'));
            $product_pict               = Input::file('productpictures');
            $product_video_youtube      = $this->xssafe(Input::get('youtubelink'));
            $product_desc               = Input::get('productdescription');

            $id_category            = DB::table('tb_category')
                                        ->where('category_name','=',$productcategory)
                                        ->pluck('id_category');
            $produk_intro           =DB::table('tb_produk')
                                        ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                                        ->where('tb_produk_detail.id_produk',$id_produk)
                                        ->pluck('produk_introduction');

           $product = tb_reversioning::create(array(
                'id_produk'                 => $id_produk,
                'id_user_owner'             => $id_owner,
                'id_user_offer'             => Auth::user()->id_user,
                'id_category'               => $id_category,
                'produk_version'            => $product_version,
                'produk_title'              => $product_title,
                'produk_type'               => $product_type,
                'reversioning_produk_status'=> $reversioning_produk_status,
                'produk_link'               => $product_link,
                'produk_introduction'       => $produk_intro,
                'produk_video_youtube'      => $product_video_youtube,
                'produk_desc'               => $product_desc

            ));

           $IDuse=$product->id_reversioning;
           $reversioning= DB::table('tb_reversioning')
                        ->where('id_produk',$id_produk)
                        ->count()+1;

           $pubpath = public_path();
           $directoryfile = $pubpath.'/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/';
           $productavaname =$product_title."_icon.jpeg";
           $productfile = Input::file('productfile')->getClientOriginalName();
           $produk_ava=File::copyDirectory($product_ava, $directoryfile);
           Input::file('productfile')->move($directoryfile, $productfile);
           $name = array();
           $n = 0;
           foreach(Request::instance()->file('productpictures') as $file) {
                $n += 1;
                $name[] = $n . '.' . $file->getClientOriginalExtension();

                $file->move($directoryfile, $name[$n - 1]);
           }

           $produk= tb_reversioning::find($IDuse);
           $produk->produk_ava    = $this->xssafe(Input::get('product_ava'));
           $produk->produk_file   = asset('/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/'.$productfile);
           $produk->produk_pict_1 = asset('/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/'.$name[0]);
           $produk->produk_pict_2 = asset('/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/'.$name[1]);
           $produk->produk_pict_3 = $n < 3 ? '' : asset('/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/'.$name[2]);
           $produk->produk_pict_4 = $n < 4 ? '' :asset('/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/'.$name[3]);
           $produk->produk_pict_5 = $n < 5 ? '' :asset('/uploads/products/freemium/'.$id_produk.'reversioning'.$reversioning.'/'.$name[4]);
           $produk->save();

           return Redirect::back()
                ->with('success','Congratulation, you reversioning has been saved in our system, please wait contributor and moderator reviews to decided your product good enough or not');

        }
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