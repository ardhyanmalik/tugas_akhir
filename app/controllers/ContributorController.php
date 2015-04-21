<?php

class ContributorController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter(function()
        {
            if(Session::get('role_id')!='3'){
                return Redirect::to('/home');
            }else{

            }
        });
    } 
 
    public function getContributorDashboard(){
        return View::make('dashboard.contributor.contributor_main');
    }

    /*
     |--------------------------------------------------------------------------
     | Account Setting
     |--------------------------------------------------------------------------
    */
    public function getAccountSetting(){
        return View::make('dashboard.contributor.Account.accountsetting');
    }
    public function postUpdateAccountInfoContributor($id_user){
        $validator=Validator::make(Input::all(),
            array(
                'name'              =>'required|max:100',
                'email'             =>'required|max:50|email',
                'username'          =>'required|max:50|min:6',
                'user_phone'        =>'numeric'
            )
        );
        if($validator->fails()){
            return Redirect::route('contributor-account-setting')
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
                return Redirect::route('contributor-account-setting')
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
            return Redirect::route('contributor-account-setting')
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
                    return Redirect::route('contributor-account-setting')
                        ->with('success','Your password has been changed');
                }
            }else{
                return Redirect::route('contributor-account-setting')
                    ->with('failed','Your old password incorrect.');
            }

        }
        return Redirect::route('contributor-account-setting')
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
            return Redirect::route('contributor-account-setting')
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
                return Redirect::route('contributor-account-setting')->withErrors($validation)
                    ->withInput();
            }

            $listExt = array('jpg', 'png', 'jpeg', 'gif', 'bmp');

            if(!in_array(strtolower($ext), $listExt)){
                return Redirect::route('contributor-account-setting')
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
                return Redirect::route('contributor-account-setting')
                    ->with('success','Profile picture has been changed');
            }
        }else{
            return Redirect::route('contributor-account-setting')
                ->with('failed','Something wrong, please check file format!');
        }
    }
   /*
    |--------------------------------------------------------------------------
    | Manage Messages
    |--------------------------------------------------------------------------
   */
  
    public function getContributorMessagesInbox() {

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
        return View::make('dashboard.contributor.messages.messages-inbox', $data);
    }

    public function getContributorMessagesSendbox() {

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
        return View::make('dashboard.contributor.messages.messages-sendbox', $data);
    }

    public function getContributorMessages() {

        $datauser = DB::table('tb_users')
                    ->where('role_id','=','1')
                    ->orWhere('role_id','=','5')
                    ->orWhere('role_id','=','6')
                    ->orWhere('role_id','=','2')
                    ->orderBy('username')
                    ->lists('name','id_user');
        $user=array(''=>'Send to :')+$datauser;
              

        
        return View::make('dashboard.contributor.messages.messages')
        ->with('user',$user);
    }

    public function insertMessage() {
        $request = Input::all();
        $request['id_user_sender'] = Session::get('user_id');        
        
        $validator = Validator::make($request, array(
            "id_user_sender"        => "required|exists:tb_users,id_user",
            "id_user_receiver"      => "required|exists:tb_users,id_user",            
            "subject"               => "required",
            "message_post"          => "required"
        ));
        
        if ($validator->fails()) {
            return Redirect::route('dashboard-contributor-messages-compose')
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
                return Redirect::route('dashboard-contributor-messages-compose')
                                ->with('success', 'Messages Sent');
            }
        }        
    }
    /*
    |--------------------------------------------------------------------------
    | Manage Sales
    |--------------------------------------------------------------------------
   */
    public function getPurchaseProductContributor(){
        $transaction = DB::table('tb_transaksi')
                        ->join('tb_users','tb_transaksi.id_user','=','tb_users.id_user')
                        ->join('tb_produk','tb_transaksi.id_produk','=','tb_produk.id_produk')
                        ->where('tb_produk.id_user','=',Auth::user()->id_user)
                        ->where('tb_transaksi.status','=',1)
                        ->get(array('tb_transaksi.id_transaksi','tb_users.name','tb_produk.produk_title','tb_transaksi.id_user','tb_transaksi.id_produk','tb_transaksi.quantity','tb_transaksi.total_harga','tb_transaksi.alamat','tb_transaksi.status','tb_transaksi.created_at'));

        return View::make('dashboard.contributor.Product.purchaseapproval')
                        ->with('transaction', $transaction);
    }

    public function postApprovePurchase(){
        $idtransaksi  = tb_transaksi::pluck('id_transaksi');
        $transaction  = tb_transaksi::find($idtransaksi);
        $transaction->status=2;
        $transaction->save();

        return Redirect::route('dashboard-contributor-manageproduct-purchased-approval')
                ->with('success','You has been approved purchase product');
    }

    public function postBannedPurchase(){
        $idtransaksi  = tb_transaksi::pluck('id_transaksi');
        $transaction  = tb_transaksi::find($idtransaksi);
        $transaction->status=5;
        $transaction->save();

        return Redirect::route('dashboard-contributor-manageproduct-purchased-approval')
                ->with('success','You has been rejected purchase product');
    }

    /*
    |--------------------------------------------------------------------------
    | Manage Product
    |--------------------------------------------------------------------------
   */
    public function getOwnProduct(){

        $products    = DB::table('tb_produk')
                        ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                        ->where('tb_produk.produk_status','=',1)
                        ->where('tb_produk.id_user',Auth::user()->id_user)
                        ->groupBy('tb_produk.id_produk')
                        ->orderBy('tb_produk.created_at','desc')
                        ->get();
        return View::make('dashboard.contributor.ownproduct')
                        ->with('products',$products);
    }

    public function getProductStatus(){
        $productStatus= DB::table('tb_produk')
                            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                            ->where('tb_produk.produk_status','=',0)
                            ->where('tb_produk_detail.produk_main','=',2)
                            ->orderBy('tb_produk.updated_at')
                            ->get();
    	return View::make('dashboard.contributor.productstatus')
                        ->with('productStatus',$productStatus);
    }

   
    public function getAddPremiumProduct(){

        $category_option = DB::table('tb_category')
                        -> where ('id_parent','!=','0')
                        -> where ('category_status','=',1)
                        -> orderBy('category_name')
                        -> lists('category_name','id_category');
        $category=array(''=>'Select Category')+$category_option;
    	return View::make('dashboard.contributor.Product.addpremiumproduct')
                        ->with('category',$category);
    }

    public function postAddPremiumProduct($id_user){

        $input = Input::all();
        $input['files'] = array_filter($input['productpictures']);
        $n = 0;
        foreach(Request::instance()->file('productpictures') as $file) {
            $input["file$n"] = $file;
            $n += 1;
        }

        $validator=Validator::make($input,
            array(
                'producttitle'          =>'required',
                'productava'            =>'required|max:4096',
                'productcategory'       =>'required',
                'productprice'          =>'required',
                'produk_introduction'   =>'required|max:160',
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
            return Redirect::route('dashboard-contributor-manageproduct-addpremium')
                ->withErrors($validator)
                ->withInput();
        }else{
            $id_user                = $this->xssafe(Input::get($id_user));
            $id_category            = $this->xssafe(Input::get('productcategory'));
            $product_title          = $this->xssafe(Input::get('producttitle'));
            $product_type           = 'Premium';
            $product_status         = 0;
            $product_ava            = Input::file('productava');
            $product_price          = $this->xssafe(Input::get('productprice'));
            $produk_introduction    = $this->xssafe(Input::get('produk_introduction'));
            $product_file           = Input::file('productfile');
            $product_link           = time().md5($product_title).str_random(60);
            $product_version        = 1;
            $product_pict           = Input::file('productpictures');
            $product_video_youtube  = $this->xssafe(Input::get('youtubelink'));
            $product_desc           = Input::get('productdescription');

            $product = tb_produk::create(array(
                'id_user'               => Auth::user()->id_user,
                'id_category'           => $id_category,
                'produk_title'          => $product_title,
                'produk_type'           => $product_type,
                'produk_harga'          => $product_price,
                'produk_status'         => $product_status,
            ));

            $IDuse=$product->id_produk;

            $product_detail = tb_produk_detail::create(array(
                'id_produk'             => $IDuse,
                'id_user'               => Auth::user()->id_user,
                'produk_introduction'   => $produk_introduction,
                'produk_link'           => $product_link,
                'produk_version'        => $product_version,
                'produk_desc'           => $product_desc,
                'produk_main'           => 2
            ));

            $pubpath = public_path();
            $directoryfile = $pubpath.'/uploads/products/premium/'.$IDuse;
                $productavaname =$product_title."_icon.jpeg";
                $productfile = Input::file('productfile')->getClientOriginalName();
                Input::file('productava')->move($directoryfile, $productavaname);
                Input::file('productfile')->move($directoryfile, $productfile);
            $name = array();
            $n = 0;
                foreach(Request::instance()->file('productpictures') as $file) {
                    $n += 1;
                    $name[] = $n . '.' . $file->getClientOriginalExtension();

                    $file->move($directoryfile, $name[$n - 1]);
                }

           $IDuse=$product->id_produk;
           $produk = DB::table('tb_produk_detail')
                        ->where('id_produk',$IDuse)
                        ->update(array(
                            'produk_ava'    => asset('/uploads/products/premium/'.$IDuse.'/'.$productavaname),
                            'produk_file'   => asset('/uploads/products/premium/'.$IDuse.'/'.$productfile),
                            'produk_pict_1' => asset('/uploads/products/premium/'.$IDuse.'/'.$name[0]),
                            'produk_pict_2' => asset('/uploads/products/premium/'.$IDuse.'/'.$name[1]),
                            'produk_pict_3' => $n < 3 ? '' : asset('/uploads/products/premium/'.$IDuse.'/'.$name[2]),
                            'produk_pict_4' => $n < 4 ? '' :asset('/uploads/products/premium/'.$IDuse.'/'.$name[3]),
                            'produk_pict_5' => $n < 5 ? '' :asset('/uploads/products/premium/'.$IDuse.'/'.$name[4])
                        ));

            return Redirect::route('dashboard-contributor-manageproduct-addpremium')
               ->with('success','Congratulation, you product has been saved in our system, please wait moderator review to decided your product good enough for published or not');
        }
    }

    public function getAddFreemiumProduct()
    {
        $category_option = DB::table('tb_category')
                    ->where('id_parent','!=','0')
                    ->where('category_status','=',1)
                    ->orderBy('category_name')
                    ->lists('category_name', 'id_category');
        $category=array(''=>'Select Category')+$category_option;
        return View::make('dashboard.contributor.Product.addfreemiumproduct')
                    ->with('category',$category);
    }

    public function postAddFreemiumProduct($id_user){

        $input = Input::all();
        $input['files'] = array_filter($input['productpictures']);
        $n = 0;
        foreach(Request::instance()->file('productpictures') as $file) {
            $input["file$n"] = $file;
            $n += 1;
        }
        $validator=Validator::make($input,
            array(
                'producttitle'          =>'required',
                'productava'            =>'required|max:4096',
                'productcategory'       =>'required',
                'version_available'     =>'required',
                'produk_introduction'   =>'required|max:160',
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
            return Redirect::route('dashboard-contributor-manageproduct-addfreemium')
                ->withErrors($validator)
                ->withInput();
        }else{
            $id_user                = $this->xssafe(Input::get($id_user));
            $id_category            = $this->xssafe(Input::get('productcategory'));
            $version_available      = $this->xssafe(Input::get('version_available'));
            $product_title          = $this->xssafe(Input::get('producttitle'));
            $product_type           = 'Freemium';
            $product_status         = 0;
            $product_ava            = Input::file('productava');
            $produk_introduction    = $this->xssafe(Input::get('produk_introduction'));
            $product_file           = Input::file('productfile');
            $product_link           = time().md5($product_title).str_random(60);
            $product_version        = 1;
            $product_pict           = Input::file('productpictures');
            $product_video_youtube  = $this->xssafe(Input::get('youtubelink'));
            $product_desc           = Input::get('productdescription');


            $product = tb_produk::create(array(
                'id_user'               => Auth::user()->id_user,
                'id_category'           => $id_category,
                'version_available'     => $version_available,
                'produk_title'          => $product_title,
                'produk_type'           => $product_type,
                'produk_status'         => $product_status,

            ));
            $IDuse=$product->id_produk;

            $product_detail = tb_produk_detail::create(array(
                'id_produk'             => $IDuse,
                'id_user'               => Auth::user()->id_user,
                'produk_introduction'   => $produk_introduction,
                'produk_link'           => $product_link,
                'produk_version'        => $product_version,
                'produk_video_youtube'  => $product_video_youtube,
                'produk_desc'           => $product_desc,
                'available'             => 0,
                'produk_main'           => 2
            ));



            $pubpath = public_path();
            $directoryfile = $pubpath.'/uploads/products/freemium/'.$IDuse;
                $productavaname =$product_title."_icon.jpeg";
                $productfile = Input::file('productfile')->getClientOriginalName();
                Input::file('productava')->move($directoryfile, $productavaname);
                Input::file('productfile')->move($directoryfile, $productfile);
            $name = array();
            $n = 0;
                foreach(Request::instance()->file('productpictures') as $file) {
                    $n += 1;
                    $name[] = $n . '.' . $file->getClientOriginalExtension();

                    $file->move($directoryfile, $name[$n - 1]);
                }
            $IDuse=$product->id_produk;
            $produk =  DB::table('tb_produk_detail')
                        ->where('id_produk',$IDuse)
                        ->update(array(
                            'produk_ava'    => asset('/uploads/products/freemium/'.$IDuse.'/'.$productavaname),
                            'produk_file'   => asset('/uploads/products/freemium/'.$IDuse.'/'.$productfile),
                            'produk_pict_1' => asset('/uploads/products/freemium/'.$IDuse.'/'.$name[0]),
                            'produk_pict_2' => asset('/uploads/products/freemium/'.$IDuse.'/'.$name[1]),
                            'produk_pict_3' => $n < 3 ? '' : asset('/uploads/products/freemium/'.$IDuse.'/'.$name[2]),
                            'produk_pict_4' => $n < 4 ? '' :asset('/uploads/products/freemium/'.$IDuse.'/'.$name[3]),
                            'produk_pict_5' => $n < 5 ? '' :asset('/uploads/products/freemium/'.$IDuse.'/'.$name[4])
                        ));

            return Redirect::route('dashboard-contributor-manageproduct-addfreemium')
               ->with('success','Congratulation, you product has been saved in our system, please wait moderator review to decided your product good enough for published or not');
        }
    }

    public function getReversioningStatus(){
        $reversioning   = DB::table('tb_reversioning')
                            ->join('tb_produk','tb_produk.id_produk','=','tb_reversioning.id_produk')
                            ->join('tb_users','tb_users.id_user','=','tb_reversioning.id_user_offer')
                            ->where('tb_reversioning.reversioning_produk_status','!=',1)
                            ->where('tb_reversioning.reversioning_produk_status','!=',4)
                            ->where('tb_reversioning.id_user_owner',Auth::user()->id_user)
                            ->get();

        return View::make('dashboard.contributor.Product.reversioningstatus')
                        ->with('reversioning',$reversioning);
    }

    public function postApproveReversioning($id_reversioning){
        $reversioning   = tb_reversioning::find($id_reversioning);
        $reversioning->reversioning_produk_status=3;
        $reversioning->save();

        return Redirect::back()
            ->with('success','You has been approved reversioning and waiting moderator approval');
    }

    public function postDenyReversioning($id_reversioning){
        $reversioning   = tb_reversioning::find($id_reversioning);
        $reversioning->reversioning_produk_status=4;
        $reversioning->save();

        $revdata    = DB::table('tb_reversioning')
            ->where('id_reversioning',$id_reversioning)
            ->first();

        $offerinfo  = DB::table('tb_users')
            ->where('id_user',$revdata->id_user_offer)
            ->first();


        if($reversioning){

            Mail::send('emails.products.reversioningdeniedcontributor',array('name'=>$offerinfo->name),function($message) use ($offerinfo){
                $message->to($offerinfo->email,$offerinfo->name)->subject('Reversioning Denied');
            });
            return Redirect::back()
                ->with('success','You has been deny reversioning');
        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please check you last activity and report to Administrator');
        }
    }

    public function getReversioningDetails($id_reversioning){
        $id_produk      = DB::table('tb_reversioning')
                            ->where('id_reversioning',$id_reversioning)
                            ->pluck('id_produk');

        $offer        = DB::table('tb_reversioning')
                            ->join('tb_users','tb_reversioning.id_user_offer','=','tb_users.id_user')
                            ->where('tb_reversioning.id_reversioning',$id_reversioning)
                            ->get();

        $product        = DB::table('tb_reversioning')
                            ->join('tb_produk','tb_produk.id_produk','=','tb_reversioning.id_produk')
                            ->join('tb_category','tb_reversioning.id_category','=','tb_category.id_category')
                            ->where('tb_reversioning.id_reversioning',$id_reversioning)
                            ->get();

        return View::make('dashboard.contributor.Product.reversioningdetails')
                    ->with(array(
                        'offer'         => $offer,
                        'product'       => $product
                    ));
    }

    public function getReversioningFile($produk_link){
        $filereversion  = DB::table('tb_reversioning')
                            ->where('produk_link',$produk_link)
                            ->pluck('produk_file');

        return Redirect::to($filereversion);
    }

    /*
    |--------------------------------------------------------------------------
    | Submit Reversioning
    |--------------------------------------------------------------------------
    */
    public function getReversioning(){
        return View::make('dashboard.contributor.product.reversioningproduct');
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
            $produk_intro           = DB::table('tb_produk')
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
