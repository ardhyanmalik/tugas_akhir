<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */
    /* 
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    |
    */
    public function postCreate(){
        $validator = Validator::make(Input::all(),
            array(
                'name'           =>'required|max:50',
                'email'			 =>'required|max:50|email|unique:tb_users',
                'username'		 =>'required|max:20|min:3|unique:tb_users',
                'password'		 =>'required|min:8',
                'confirmPassword'=>'required|same:password'
            )
        );
        if($validator->fails()){
            return Redirect::route('account-create-account')
                ->withErrors($validator)
                ->withInput();
        }else{
            $name       = $this->xssafe(Input::get('name'));
            $email 		= $this->xssafe(Input::get('email'));
            $username	= $this->xssafe(Input::get('username'));
            $password 	= $this->xssafe(Input::get('password'));
            $code 		= str_random(60);

            $user 	= tb_users::create(array(
                'name'          => $name,
                'email' 	    => $email,
                'username'	    => $username,
                'password'	    => Hash::make($password),
                'code'		    => $code,
                'role_id'       => 4,
                'status_user'	=> 0
            ));

            if($user){

                Mail::send('emails.account.active.guestactive',array('link'=>URL::route('account-active',$code),'name'=>$name),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Active your account');
                });
                return Redirect::route('account-sign-in')
                    ->with('success-register','Your account has been created! We have sent you an  email to actived your account');
            }

        }
    }

    /*
    |--------------------------------------------------------------------------
    | User Activation Code
    |--------------------------------------------------------------------------
    |
    */
    public function getActive($code){
        $user=tb_users::where('code','=',$code)->where('status_user','=',0);

        if($user->count()){
            $user=$user->first();

            //update user to active state
            $user->status_user = 1;
            $user->code 	= '';

            $user->save();

            if($user->save()){
                return Redirect::route('account-sign-in')
                    ->with('success','Activated! You can now sign in');
            }

        }

        return Redirect::route('account-sign-in')
            ->with('failed','We could not active your account. Try again later');
    }
    /*
    |--------------------------------------------------------------------------
    | Social Media Authentication
    |--------------------------------------------------------------------------
    |
    */
    public function getFacebookLogin($auth=NULL)
    {
        if ($auth == 'auth')
        {
            try
            {
                Hybrid_Endpoint::process();
            }
            catch (Exception $e)
            {
                return Redirect::to('fbauth');
            }
            return;
        }

        $oauth = new Hybrid_Auth(app_path(). '/config/fb_auth.php');
        $provider = $oauth->authenticate('Facebook');
        $profile = $provider->getUserProfile();

        $facebookProfile        =   $profile->profileURL;
        $facebookPhoto          =   $profile->photoURL;
        $facebookDisplayName    =   $profile->displayName;
        $facebookEmail          =   $profile->email;
        $facebookPhone          =   $profile->phone;
        $facebookAddress        =   $profile->address;

        $userchecker=DB::table('tb_users')
            ->where('email','=',$facebookEmail)->pluck('email');

        if($userchecker == null){
            $user 	= tb_users::create(array(
                'name'          => $facebookDisplayName,
                'email' 	    => $facebookEmail,
                'user_photo'    => $facebookPhoto,
                'user_phone'    => $facebookPhone,
                'user_address'  => $facebookAddress,
                'role_id'       => 4,
                'status_user'	=> 1,
                'facebook_link' =>$facebookProfile
            ));
            if($user){

                Mail::send('emails.account.active.guestfacebook',array('name'=>$facebookDisplayName),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Welcome to Telkom University Store');
                });
                $user = tb_users::where('email', $facebookEmail)->first();
                Auth::login($user,true);
                Session::set('role_id', 4);
                return Redirect::intended('/home');

            }

        }else{
            $user = tb_users::where('email', $facebookEmail)->first();
            Auth::login($user,true);
            Session::set('role_id', 4);
            return Redirect::intended('/home');
        }

    }

    public function getGoogleLogin($auth=NULL)
    {
        if ($auth == 'auth')
        {
            Hybrid_Endpoint::process();

        }
        try {
            $oauth = new Hybrid_Auth(app_path() . '/config/google_auth.php');
            $provider = $oauth->authenticate('Google');
            $profile = $provider->getUserProfile();
            print_r($profile);
        }
        catch(exception $e)
        {
            return $e->getMessage();
        }

        $googleProfile      =   $profile->profileURL;
        $googlePhoto        =   $profile->photoURL;
        $googleDisplayName  =   $profile->displayName;
        $googleEmail        =   $profile->email;
        $googlePhone        =   $profile->phone;
        $googleAddress      =   $profile->address;

        $userchecker=DB::table('tb_users')
            ->where('email','=',$googleEmail)->pluck('email');

        if($userchecker == null){
            $user 	= tb_users::create(array(
                'name'          =>  $googleDisplayName,
                'email' 	    =>  $googleEmail,
                'user_photo'    =>  $googlePhoto,
                'user_phone'    =>  $googlePhone,
                'user_address'  =>  $googleAddress,
                'role_id'       =>  4,
                'status_user'	=>  1,
                'google_link'   =>  $googleProfile
            ));
            if($user){

                Mail::send('emails.account.active.guestgoogle',array('name'=>$googleDisplayName),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Welcome to Telkom University Store');

                });
                $user = tb_users::where('email', $googleEmail)->first();
                Auth::login($user,true);
                Session::set('role_id', 4);
                return Redirect::intended('/home');

            }

        }else{
            $user = tb_users::where('email', $googleEmail)->first();
            Auth::login($user,true);
            Session::set('role_id', 4);
            return Redirect::intended('/home');
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Logout Users
    |--------------------------------------------------------------------------
    |
    */
    public function getLoggedOut()
    {
        // $hauth = new Hybrid_Auth(app_path() . '/config/twitterAuth.php');
        $hauth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
        //You can use any of the one provider to get the variable, I am using google
        //this is important to do, as it clears out the cookie
        $hauth=new Hybrid_auth(app_path().'/config/google_auth.php');
        $hauth->logoutAllProviders();
        Session::flush();
        Auth::logout();
        //return View::make('homepage.homepage');
        return Redirect::route('homepage');

    }
    /*
    |--------------------------------------------------------------------------
    | TEL-US Authentication
    |--------------------------------------------------------------------------
    |
    */
    public function postSignIn(){
        $validator= Validator::make(Input::all(),
            array(
                'username'=>'required',
                'password'=>'required'
            )
        );

        if($validator->fails()){
            //Redirect to the sign in page
            return Redirect::route('account-sign-in')
                ->withErrors($validator)
                ->withInput();
        }else{

            $remember = (Input::has('remember')) ?true : false;

            //Attempt user sign in
            $auth=Auth::attempt(array(
                'username'=>$this->xssafe(Input::get('username')),
                'password'=>$this->xssafe(Input::get('password')),
                'status_user'=>1
            ),$remember);

            if($auth){
                $user_id=Auth::user()->id_user;
                $role_id=Auth::user()->role_id;
                Session::put('user_id',$user_id);
                Session::put('role_id',$role_id);
                //Rediret to intended page
                return Redirect::intended('/home');
            }else{
                return Redirect::route('account-sign-in')
                    ->with('global','username  or password wrong, or account not activated');
            }
        }

        return Redirect::route('account-sign-in')
            ->with('global','There was a problem signin you in. Have you activated?');
    }

    /*
    |--------------------------------------------------------------------------
    | Landing Page
    |--------------------------------------------------------------------------
    |
    */
    public function landingpage(){
        return View::make('homepage.landingpage');
    }

    public function postAccountSubscribe(){
        $validator=Validator::make(Input::all(),
            array(
                'id_contributor'    =>'required|min:10|numeric|unique:tb_users',
                'name'              =>'required|max:100',
                'email'             =>'required|max:50|email|unique:tb_users',
            )
        );
        if($validator->fails()){
            return Redirect::route('landingpage')
                ->withErrors($validator)
                ->withInput();
        }else{
            $id_contributor = $this->xssafe(Input::get('id_contributor'));
            $name           = $this->xssafe(Input::get('name'));
            $email          = $this->xssafe(Input::get('email'));

            $user    = tb_users::create(array(
                'id_contributor'=> $id_contributor,
                'name'          => $name,
                'email'         => $email,
                'username'      => $id_contributor,
                'password'      => Hash::make($id_contributor),
                'role_id'       => 4,
                'status_user'   => 1

            ));

            if($user){

                Mail::send('emails.subscribes.greetingsubscribes',array('name'=>$name),function($message) use ($user){
                    $message->to($user->email,$user->name)->subject('Subscribe Telkom University Store');
                });
                return Redirect::route('landingpage')
                    ->with('success','Thank you for subscribe us, we will keep in touch with you by email');
            }


        }
    }
    /*
    |--------------------------------------------------------------------------
    | Homepage Pages
    |--------------------------------------------------------------------------
    |
    */
    public function homepage(){
        $parentproduct   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $parentservice   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $categoriesproduct =DB::table('tb_category')
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategory        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $categoriesservice =DB::table('tb_category')
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategorys        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $freemium   = DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk.produk_type','=','Freemium')
            ->where('tb_produk_detail.available','=',1)
            ->where('tb_produk_detail.produk_main','=',1)
            ->orderBy('tb_produk_detail.updated_at','desc')
            ->take(5)
            ->get(array('tb_users.id_user','tb_users.id_contributor','tb_category.category_name','tb_produk_detail.id_produk_detail','tb_produk_detail.produk_link','tb_produk.id_category','tb_produk.produk_title','tb_produk.produk_type','tb_produk_detail.produk_ava','tb_produk_detail.produk_introduction','tb_produk.version_available','tb_produk_detail.updated_at'));

        $premium   = DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk.produk_type','=','Premium')
            ->where('tb_produk_detail.produk_main','=',1)
            ->orderBy('tb_produk_detail.updated_at','desc')
            ->take(5)
            ->get(array('tb_users.id_user','tb_users.id_contributor','tb_category.category_name','tb_produk.produk_harga','tb_produk_detail.id_produk_detail','tb_produk_detail.produk_link','tb_produk.id_Category','tb_produk.produk_title','tb_produk.produk_type','tb_produk_detail.produk_ava','tb_produk_detail.produk_introduction','tb_produk_detail.updated_at'));

        return View::make('homepage.homepage')
            ->with(array(
                'freemium'          =>$freemium,
                'premium'           =>$premium,
                'parentproduct'     =>$parentproduct,
                'parentservice'     =>$parentservice,
                'categoriesproduct' =>$categoriesproduct,
                'subcategory'       =>$subcategory,
                'subcategorys'      =>$subcategorys,
                'categoriesservice' =>$categoriesservice,
            ));
    }

    public function getProductDetails($id_produk_detail){
        $id_produk       = DB::table('tb_produk_detail')
            ->where('id_produk_detail',$id_produk_detail)
            ->pluck('id_produk');

        $parentproduct   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $parentservice   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $categoriesproduct =DB::table('tb_category')
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategory        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $categoriesservice =DB::table('tb_category')
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategorys        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $produkdetail   = DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->where('tb_produk_detail.id_produk_detail',$id_produk_detail)
            ->where('tb_produk_detail.available',1)
            ->where('tb_produk_detail.produk_main',1)
            ->get();

        $histories      = DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_users','tb_produk_detail.id_user','=','tb_users.id_user')
            ->where('tb_produk.id_produk',$id_produk)
            ->orderby('tb_produk_detail.updated_at','desc')
            ->take(5)
            ->get();

        $userhistory    = DB::table('tb_produk_detail')
            ->join('tb_users','tb_produk_detail.reversioning_by','=','tb_users.id_user')
            ->where('tb_produk_detail.id_produk',$id_produk)
            ->select('*','tb_users.name as reversionoffer')
            ->get();

        $cart_content = Cart::content(1);

        for($i=1;$i<=5;$i++){
            $getstar[$i]       = DB::table('tb_rate')
                ->where('user_rate',$i)
                ->where('id_produk',$id_produk)
                ->count();
        }

        $total_rate_user= DB::table('tb_rate')
            ->where('id_produk',$id_produk)
            ->count();

        if (Auth::check()){
            $user_review  = DB::table('tb_rate')
                ->join('tb_produk','tb_produk.id_produk','=','tb_rate.id_produk')
                ->join('tb_users','tb_users.id_user','=','tb_rate.id_user')
                ->where('tb_produk.id_produk',$id_produk)
                ->where('tb_users.id_user',Auth::user()->id_user)
                ->get();
        }else{
            $user_review="";
        }

        $ratereview   = DB::table('tb_rate')
            ->join('tb_produk','tb_produk.id_produk','=','tb_rate.id_produk')
            ->join('tb_users','tb_users.id_user','=','tb_rate.id_user')
            ->where('tb_produk.id_produk',$id_produk)
            ->orderBy('tb_rate.updated_at','desc')
            ->get();

        return View::make('homepage.homepage_productdetails')
            ->with(array(
                'parentproduct'     =>$parentproduct,
                'parentservice'     =>$parentservice,
                'categoriesproduct' =>$categoriesproduct,
                'categoriesservice' =>$categoriesservice,
                'subcategory'       =>$subcategory,
                'subcategorys'      =>$subcategorys,
                'produkdetail'      =>$produkdetail,
                'getstar5'          =>$getstar[5],
                'getstar4'          =>$getstar[4],
                'getstar3'          =>$getstar[3],
                'getstar2'          =>$getstar[2],
                'getstar1'          =>$getstar[1],
                'total_rate_user'   =>$total_rate_user,
                'user_review'       =>$user_review,
                'ratereview'        =>$ratereview,
                'histories'         =>$histories,
                'cart_content'      =>$cart_content,
                'userhistory'       =>$userhistory

            ));
    }

    public function getProductHistory($id_produk){
        $parentproduct   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $parentservice   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $categoriesproduct =DB::table('tb_category')
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategory        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $categoriesservice =DB::table('tb_category')
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategorys        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $histories      = DB::table('tb_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->where('tb_produk.id_produk',$id_produk)
            ->orderby('tb_produk_detail.updated_at','desc')
            ->take(5)
            ->get();

        $userhistory    = DB::table('tb_produk_detail')
            ->join('tb_users','tb_produk_detail.reversioning_by','=','tb_users.id_user')
            ->where('tb_produk_detail.id_produk',$id_produk)
            ->select('*','tb_users.name as reversionoffer')
            ->get();

        return View::make('homepage.homepage_producthistory')
            ->with(array(
                'parentproduct'     =>$parentproduct,
                'parentservice'     =>$parentservice,
                'categoriesproduct' =>$categoriesproduct,
                'subcategory'       =>$subcategory,
                'subcategorys'      =>$subcategorys,
                'categoriesservice' =>$categoriesservice,
                'histories'         => $histories,
                'userhistory'       => $userhistory
            ));
    }

    public function getPremiumProductsPurchase($id_produk){

        $category   = DB::table('tb_category')
            ->where('category_status','=',1)
            ->get();
        $produk     = DB::table('tb_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->where('tb_produk.id_produk',$id_produk)
            ->get();
        $cart_content   = Cart::content(1);
        return View::make('homepage.homepage_premiumproducts_purchase')
            ->with(array(
                'category'  =>$category,
                'produk'    =>$produk,
                'cart_content' => $cart_content

            ));
    }

    public function getPremiumProductsChart($id_produk){

        $produk     = tb_produk::find($id_produk);
        $id         = $produk->id_produk;
        $name       = $produk->produk_title;
        $qty        = 1;
        $price      = $produk->produk_harga;


        $data       = array(              

            'id'            => $id,
            'name'          => $name,
            'qty'           => $qty,
            'price'         => $price,
        );

        Cart::add($data);
        $cart_content = Cart::content(1);

            return View::make('homepage.popup_add_to_cart', compact('cart_content','produk_detail'));
    }


    public function getPremiumProductsCheckout(){


        $number = (string)rand(0000, 9999);
        $formid = $number;
        $cart_content   = Cart::content(1);

        $nomortransaction = tb_nomor_transaksi::create(array(
            'nomor_transaksi'    => $formid,
            'total_transaksi'   => Cart::total()
            ));

        foreach ($cart_content as $cart){
           

            $transaction = tb_transaksi::create(array(

                'id_produk'         => $cart->id,
                'quantity'          => $cart->qty,
                'total_harga'       => $cart->price * $cart->qty,
                'status'            => 0,
                'id_nomor_transaksi'=> $nomortransaction->id_nomor_transaksi,
                'id_user'           => Auth::user()->id_user
            ));
        }

        $usermail = Auth::user()->email;

/*        if($usermail) {
            Mail::send('emails.account.deleted.administratordeleted', array($usermail), function($message) use ($usermail){
                $message->to($usermail)->subject('Product Purchased');
            });
    
        }*/
        Cart::destroy();
     
 /*     return Redirect::back();*/


 return Redirect::route('products-premium-products-checkout-shop', array('id_nomor_transaksi'));
    }

    public function getViewCheckout($id_nomor_transaksi){

        $transaction = DB::table('tb_nomor_transaksi')
                        ->where('id_nomor_transaksi',$id_nomor_transaksi)
                        ->get();

        return View::make('homepage.homepage_checkout_shop')
            ->with('transaction', $transaction);
    }

    public function postDeleteProductChart($id_produk){
        Cart::remove($id_produk);
        return Redirect::route('product-details')

            ->with('cart_content', $cart_content);
    }


    public function getProductlist(){
        $parentproduct   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $parentservice   = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $categoriesproduct =DB::table('tb_category')
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategory        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $categoriesservice =DB::table('tb_category')
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategorys        =DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $products           =DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_category','tb_category.id_category','=','tb_produk.id_category')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk_detail.available','=',1)
            ->where('tb_produk_detail.produk_main','=',1)
            ->orderBy('tb_produk_detail.updated_at','desc')
            ->paginate(5);


        return View::make('homepage.homepage_productlist')
            ->with(array(
                'parentproduct'     =>$parentproduct,
                'parentservice'     =>$parentservice,
                'categoriesproduct' =>$categoriesproduct,
                'subcategory'       =>$subcategory,
                'subcategorys'      =>$subcategorys,
                'categoriesservice' =>$categoriesservice,
                'products'          =>$products,

            ));
    }

    public function getProductListFreemium(){
        $parentproduct      = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $parentservice      = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $categoriesproduct  = DB::table('tb_category')
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategory        = DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $categoriesservice =DB::table('tb_category')
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategorys        = DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $products           = DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_category','tb_category.id_category','=','tb_produk.id_category')
            ->where('tb_produk.produk_type','=','Freemium')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk_detail.available','=',1)
            ->where('tb_produk_detail.produk_main','=',1)
            ->orderBy('tb_produk_detail.updated_at','desc')
            ->paginate(5);


        return View::make('homepage.homepage_freemiumshowmore')
            ->with(array(
                'parentproduct'     =>$parentproduct,
                'parentservice'     =>$parentservice,
                'categoriesproduct' =>$categoriesproduct,
                'subcategory'       =>$subcategory,
                'subcategorys'      =>$subcategorys,
                'categoriesservice' =>$categoriesservice,
                'products'          =>$products,

            ));
    }

    public function getProductListCategory($id_category){
        $parentproduct      = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $parentservice      = DB::table('tb_category')
            ->where('id_parent','=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('category_name')
            ->orderBy('category_name','asc')
            ->get();

        $categoriesproduct  = DB::table('tb_category')
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategory        = DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',1)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $categoriesservice =DB::table('tb_category')
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->groupBy('id_parent')
            ->get();

        $subcategorys        = DB::table('tb_category')
            ->where('id_parent','!=',0)
            ->where('category','=',2)
            ->where('category_status','=',1)
            ->orderBy('category_name','asc')
            ->get();

        $products           = DB::table('tb_produk')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->join('tb_category','tb_category.id_category','=','tb_produk.id_category')
            ->where('tb_produk.id_category','=',$id_category)
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk_detail.available','=',1)
            ->where('tb_produk_detail.produk_main','=',1)
            ->orderBy('tb_produk_detail.updated_at','desc')
            ->paginate(5);

        return View::make('homepage.homepage_productcategory')
            ->with(array(
                'parentproduct'     =>$parentproduct,
                'parentservice'     =>$parentservice,
                'categoriesproduct' =>$categoriesproduct,
                'subcategory'       =>$subcategory,
                'subcategorys'      =>$subcategorys,
                'categoriesservice' =>$categoriesservice,
                'products'          =>$products
            ));
    }

    public function postRateReview($id_produk){
        $validator=Validator::make(Input::all(),
            array(
                'product_rate'      =>'required',
                'review_title'      =>'required',
                'review'            =>'required',
            )
        );
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if (Auth::check())
            {

                $review_title   = $this->xssafe(Input::get('review_title'));
                $review_post    = $this->xssafe(Input::get('review'));
                $product_rate   = $this->xssafe(Input::get('product_rate'));
                $id_user        = Auth::user()->id_user;
                //find user activity on rate and review
                $checker        = DB::table('tb_rate')
                    ->where('id_produk',$id_produk)
                    ->where('id_user',$id_user)
                    ->first();
                if($checker == null){

                    $new_rate       = tb_rate::create(array(
                        'id_user'       =>$id_user,
                        'id_produk'     =>$id_produk,
                        'review_title'  =>$review_title,
                        'review_post'   =>$review_post,
                        'user_rate'     =>$product_rate
                    ));

                    $update_produk  =tb_produk::find($id_produk);
                    $update_produk->user_rate_total  +=1;
                    $update_produk->save();

                    $totalcount =DB::table('tb_rate')
                        ->where('id_produk',$id_produk)
                        ->sum('user_rate');
                    $total_user = DB::table('tb_produk')
                        ->where('id_produk',$id_produk)
                        ->pluck('user_rate_total');
                    $result     = $totalcount/$total_user;
                    $produk_rate_total  = tb_produk::find($id_produk);
                    $produk_rate_total  -> produk_rate_total =  $result;
                    $produk_rate_total->save();

                    return Redirect::back()
                        ->with('success','Thank you for your rating and review');
                }else{
                    $rate   = DB::table('tb_rate')
                        ->where('id_produk',$id_produk)
                        ->where('id_user',$id_user)
                        ->update(array(
                            'review_title'  =>$review_title,
                            'review_post'   =>$review_post,
                            'user_rate'     =>$product_rate,
                            'updated_at'    =>DB::raw('NOW()')
                        ));

                    $totalcount =DB::table('tb_rate')
                        ->where('id_produk',$id_produk)
                        ->sum('user_rate');
                    $total_user = DB::table('tb_produk')
                        ->where('id_produk',$id_produk)
                        ->pluck('user_rate_total');
                    $result     = $totalcount/$total_user;
                    $produk_rate_total  = tb_produk::find($id_produk);
                    $produk_rate_total  -> produk_rate_total =  $result;
                    $produk_rate_total->save();

                    return Redirect::back()
                        ->with('success','Thank you for your rating and review');
                }


            }else{
                return Redirect::back()
                    ->with('failed','Sorry,something not right,maybe you can try again later');
            }

        }
    }


    public function getAccountSignin(){
        return View::make('homepage.login');
    }
    public function getForgotPassword(){
        return View::make('homepage.forgotpassword');
    }

    public function postForgotPassword(){
        $validator=Validator::make(Input::all(),
            array(
                'email'=>'required|email|exists:tb_users,email'
            )
        );

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else{
            //change password
            $user = tb_users::where('email','=',$this->xssafe(Input::get('email')));
            $userrole= DB::table('tb_users')
                ->where('email','=',$this->xssafe(Input::get('email')))
                ->pluck('role_id');
            $username   = DB::table('tb_users')
                ->where('email','=',$this->xssafe(Input::get('email')))
                ->pluck('username');
            $name        = DB::table('tb_users')
                ->where('email','=',$this->xssafe(Input::get('email')))
                ->pluck('name');
            if($user->count() && $userrole != 3 && $username!= null){
                $user= $user->first();

                //Generate a new code and password
                $code 		= str_random(60);
                $password 	= str_random(10);

                $user->code= $code;
                $user->password_temp =Hash::make($password);

                if($user->save()){
                    Mail::send('emails.account.revive.revive',array('link'=>URL::route('account-recover',$code),'name' => $name ,'username'=>$user->username,'password'=>$password),function($message) use ($user){
                        $message->to($user->email,$user->username)->subject('New Password');
                    });
                    return Redirect::back()
                        ->with('success','We have sent you a new password by email');
                }
            }else{
                return Redirect::back()
                    ->with('failed','Something wrong, we cannot reset your password if you are logged via social media or Telkom University SSO ');
            }
        }
        return View::make('homepage.forgotpassword');
    }

    public function getRecover($code){
        $user = tb_users::where('code','=',$code)
            ->where('password_temp','!=','');

        if($user->count()){
            $user=$user->first();


            $user->password 		= $user->password_temp;
            $user->password_temp	= '';
            $user->code 			= '';

            if($user->save()){

                return Redirect::route('account-sign-in-post')
                    ->with('success','Your account has been recovered and you can sign in with your new password.');
            }
        }

        return Redirect::route('account-sign-in-post')
            ->with('failed','Could not recover your account');
    }

    public function getCreateAccount(){
        return View::make('homepage.createaccount');
    }
    public function getFAQ(){
        return View::make('homepage.homepage_faq');
    }

    public function getProfile(){
        return View::make('homepage.profile');
    }

    /*
    |--------------------------------------------------------------------------
    | Freemium Downloaded
    |--------------------------------------------------------------------------
    |
    */
    public function getDownload($produk_link){
        $id_produk_detail = DB::table('tb_produk_detail')
            ->where('produk_link',$produk_link)
            ->pluck('id_produk_detail');

        $url=DB::table('tb_produk_detail')
            ->where('id_produk_detail',$id_produk_detail)
            ->pluck('produk_file');

        $id_produk= DB::table('tb_produk_detail')
            ->where('id_produk_detail',$id_produk_detail)
            ->pluck('id_produk');

        $product=tb_produk::find($id_produk);
        $product    -> produk_downloaded += 1;
        $product    ->save();
        return Redirect::to($url);
    }



    /*
    |--------------------------------------------------------------------------
    | Security Methods
    |--------------------------------------------------------------------------
    |
    */
    public function postAdvanceSearch(){
        $keywords   = $this->xssafe(Input::get('keywords'));

        $queries   = DB::table('tb_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk.produk_title', 'LIKE', '%'.$keywords.'%')
            ->orWhere('tb_users.name', 'LIKE', '%'.$keywords.'%')
            ->groupBy('tb_produk.id_produk')
            ->paginate(5);

        $counter   = DB::table('tb_produk')
            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
            ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
            ->where('tb_produk.produk_status','=',1)
            ->where('tb_produk.produk_title', 'LIKE', '%'.$keywords.'%')
            ->orWhere('tb_users.name', 'LIKE', '%'.$keywords.'%')
            ->groupBy('tb_produk.id_produk')
            ->get();
        $category_option = DB::table('tb_category')
            ->where('id_parent','!=','0')
            ->where('category_status','=',1)
            ->orderBy('category_name')
            ->lists('category_name', 'id_category');
        $category=array(''=>'Select Category')+$category_option;

        return View::make('homepage.homepage_search', compact('queries'))
            ->with(array(
                'queries'           => $queries,
                'counter'           => $counter,
                'category'          => $category
            ));
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
