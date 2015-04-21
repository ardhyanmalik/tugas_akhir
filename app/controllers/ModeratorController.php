<?php

class ModeratorController extends BaseController
{
 
    public function __construct()
    {
        $this->beforeFilter(function()
        {
            if(Session::get('role_id')!='2'){
                return Redirect::to('/home');
            }else{

            }
        });
    }
 
    public function getModeratorDashboard()
    {
        return View::make('dashboard.moderator.moderator_main');
    }

    /*
      |--------------------------------------------------------------------------
      | Account Setting
      |--------------------------------------------------------------------------
    */

    public function getAccountSetting()
    {
        return View::make('dashboard.moderator.Account.accountsetting');
    }
    public function postUpdateAccountInfoModerator($id_user){
        $validator=Validator::make(Input::all(),
            array(
                'name'              =>'required|max:100',
                'email'             =>'required|max:50|email',
                'username'          =>'required|max:50|min:6',
                'user_phone'        =>'numeric'
            )
        );
        if($validator->fails()){
            return Redirect::route('moderator-account-setting')
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
                return Redirect::route('moderator-account-setting')
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
            return Redirect::route('moderator-account-setting')
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
                    return Redirect::route('moderator-account-setting')
                        ->with('success','Your password has been changed');
                }
            }else{
                return Redirect::route('moderator-account-setting')
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
            return Redirect::route('moderator-account-setting')
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
                return Redirect::route('moderator-account-setting')->withErrors($validation)
                    ->withInput();
            }

            $listExt = array('jpg', 'png', 'jpeg', 'gif', 'bmp');

            if(!in_array(strtolower($ext), $listExt)){
                return Redirect::route('moderator-account-setting')
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
                return Redirect::route('moderator-account-setting')
                    ->with('success','Profile picture has been changed');
            }
        }else{
            return Redirect::route('moderator-account-setting')
                ->with('failed','Something wrong, please check file format!');
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Manage Messages
    |--------------------------------------------------------------------------
    */
    public function getModeratorMessagesInbox() {

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
        return View::make('dashboard.moderator.messages.messages-inbox', $data);
    }

    public function getModeratorMessagesSendbox() {

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
        return View::make('dashboard.moderator.messages.messages-sendbox', $data);
    }

    public function getModeratorMessages() {

        $datauser = DB::table('tb_users')
                    ->where('role_id','=','1')
                    ->orWhere('role_id','=','3')
                    ->orWhere('role_id','=','5')
                    ->orWhere('role_id','=','6')
                    ->orWhere('role_id','=','4')
                    ->orderBy('username')
                    ->lists('name','id_user');
        $user=array(''=>'Send to :')+$datauser;
              
        return View::make('dashboard.moderator.messages.messages')
        ->with('user',$user);
    }
/*
    public function getMessages($id_message){

        $message = tb_message::find($id_message);
        $name    = I
        $


        else {
            $user = tb_users::find($id_user);
            $name = Input::get('name');
            $id_contributor = Input::get('id_contributor');
            $email = Input::get('email');
            $username = Input::get('username');
            $password = Input::get('password');
        return View::make('dashboard.moderator.messages.getmessages');
    }
*/

   
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
            return Redirect::route('dashboard-administrator-messages-compose')
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
                return Redirect::route('dashboard-administrator-messages-compose')
                                ->with('success', 'Messages Sent');
            }
        }        
    }
    /*
     |--------------------------------------------------------------------------
     | Manage Categories
     |--------------------------------------------------------------------------
    */
    public function getContentCategories()
    {
        $category=DB::table('tb_category')
                        ->where('id_parent',0)->get();
        return View::make('dashboard.moderator.categories.productcategories')
                            ->with('category',$category);
    }

    public function postContentCategories(){
        $validator=Validator::make(Input::all(),
            array(
                'category'      =>'required',
                'category_name' =>'required|max:20|unique:tb_category'
            )
        );
        if($validator->fails()){
            return Redirect::route('dashboard-moderator-content-categories')
                ->withErrors($validator)
                ->withInput();
        }else{
            $category            = $this->xssafe(Input::get('category'));
            $category_name       = $this->xssafe(Input::get('category_name'));

            $user    = tb_category::create(array(
                'category_name'         => $category_name,
                'category'              => $category,
                'category_status'       => 1
            ));
            return Redirect::route('dashboard-moderator-content-categories')
                ->with('success','New Category of product has been added');
        }
    }
    public function postEditCategory($id_category){
        $validator=Validator::make(Input::all(),
            array(
                'category'      =>'required',
                'category_name' =>'required|max:20|unique:tb_category',
            )
        );
        if($validator->fails()){
            return Redirect::route('dashboard-moderator-content-categories')
                ->withErrors($validator)
                ->withInput();
        }else{
            $category           = tb_category::find($id_category);
            $name               = $this->xssafe(Input::get('category_name'));
            $category_new       = $this->xssafe(Input::get('category'));
            $category-> category_name   = $name;
            $category-> category        = $category_new;
            $category-> save();
            return Redirect::route('dashboard-moderator-content-categories')
                ->with('success','Category has been updated');
        }
    }
    public function postBannedCategory($id_category){
        $bannedcategory = tb_category::find($id_category);
        $bannedcategory->category_status = 2;
        $bannedcategory->save();
        if($bannedcategory){
            return Redirect::back()
            ->with('success','a product category has been banned');
        }else{
            return Redirect::back()
                ->with('failed','Due some issue system can not banned a product category');
        }
    }

    public function postDeleteParentCategory($id_category){
        $checksub       = DB::table('tb_category')
                            ->where('id_parent',$id_category)
                            ->get();

        $productcheck   = DB::table('tb_produk')
                                ->join('tb_category','tb_category.id_category','=','tb_produk.id_category')
                                ->whereIn('tb_produk.id_category',array_pluck($checksub,'id_category'))
                                ->get();

        $reverioncheck  = DB::table('tb_reversioning')
                                ->join('tb_category','tb_category.id_category','=','tb_reversioning.id_category')
                                ->whereIn('tb_reversioning.id_category',array_pluck($checksub,'id_category'))
                                ->get();

        //print_r($reverioncheck);
        if($productcheck== null && $reverioncheck==null){
            $deletesub      = DB::table('tb_category')
                ->where('id_parent',$id_category)
                ->delete();

            $deletecategory = tb_category::find($id_category)->delete();

            if($deletecategory){
                return Redirect::back()
                    ->with('success','System has been delete a category');
            }else{
                return Redirect::back()
                    ->with('failed','System can not delete a category,maybe because id_category still in use or record by another product');
            }
        }else{
            return Redirect::back()
                ->with('failed','System cannot delete a category, maybe because category still in use in product or reversioning');
        }
    }

    public function postDeleteCategory($id_category){
        $deletecategory=tb_category::find($id_category)->delete();
        if($deletecategory){
            return Redirect::back()
                ->with('success','System has been delete a category');
        }else{
            return Redirect::back()
                ->with('failed','System can not delete a category,maybe because id_category still in use or record by another product');
        }
    }
    public function getCategoryDetails($id_category){
        $category = DB::table('tb_category')
                        ->where('id_parent',$id_category)
                        ->get();
        $parent_category_option = DB::table('tb_category')
                            ->where('category_status','=',1)
                            ->where('id_parent',0)
                            ->orderBy('category_name')
                            ->lists('category_name', 'id_category');
        $parent = DB::table('tb_category')
            ->where('id_category',$id_category)
            ->get();
        $parentcategory=array(''=>'Select Parent Category')+$parent_category_option;
        return View::make('dashboard.moderator.categories.category_details')
                        ->with(array(
                            'category'          =>$category,
                            'parent'            =>$parent,
                            'parentcategory'    =>$parentcategory
                        ));
    }
    public function postSubCategories($id_category){
        $validator=Validator::make(Input::all(),
            array(
                'category_parent'=>'required',
                'category_name'  =>'required|max:20|unique:tb_category'
            )
        );
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $tb_category        = tb_category::find($id_category);
            $category_parent    = $this->xssafe(Input::get('category_parent'));
            $category_name      = $this->xssafe(Input::get('category_name'));
            $id_category        = DB::table('tb_category')
                                    ->where('category_name',$category_parent)
                                    ->pluck('id_category');
            $category=DB::table('tb_category')
                            ->where('id_category',$id_category)
                            ->get();

            $id = DB::table('tb_category')
                    ->where('category_name',$category_parent)
                    ->pluck('id_category');

            $category = DB::table('tb_category')
                        ->where('id_category',$id_category)
                        ->pluck('category');
            $user    = tb_category::create(array(
                'category_name'         => $category_name,
                'id_parent'             => $id,
                'category'              => $category,
                'category_status'       => 1
            ));
            return Redirect::back()
                ->with('success','New Sub-Category of product has been added');

        }

    }
    public function postEditSubCategory($id_category){
        $validator=Validator::make(Input::all(),
            array(
                'category_name' =>'required|max:20|unique:tb_category',
            )
        );
        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $category           = tb_category::find($id_category);
            $name               = $this->xssafe(Input::get('category_name'));

            $category-> category_name   = $name;
            $category-> save();
            return Redirect::back()
                ->with('success','Sub-Category has been updated');
        }
    }

    /*
     |--------------------------------------------------------------------------
     | Manage Product
     |--------------------------------------------------------------------------
    */
    public function getModeratorNewProduct()
    {
        return View::make('dashboard.moderator.product.new-product');
    }

    public function getModeratorProductStatus()
    {
        return View::make('dashboard.moderator.product.product-status');
    }

    public function getModeratorEditProduct()
    {
        return View::make('dashboard.moderator.product.edit-product');
    }

    public function getModeratorUserStatus()
    {
        return View::make('dashboard.moderator.user.user-status');
    }

    public function getModeratorNewProducts()
    {
        return View::make('dashboard.moderator.product.moderator_newproducts');
    }

    public function getModeratorCategoriesList()
    {
        return View::make('dashboard.moderator.product.categories-list');
    }

    public function getProductList(){
        $product    = DB::table('tb_produk')
                        ->join('tb_produk_detail','tb_produk_detail.id_produk','=','tb_produk.id_produk')
                        ->join('tb_users','tb_users.id_user','=','tb_produk.id_user')
                        ->groupBy('tb_produk_detail.id_produk')
                        ->orderBy('tb_produk_detail.updated_at')
                        ->get();

        return View::make('dashboard.moderator.product.productlist')
                    ->with('product',$product);
    }

    public function getProductListBanned($id_produk){
        $produk     = tb_produk::find($id_produk);
        $produk ->produk_status  = 2;
        $produk ->save();

        if($produk){
            return Redirect::back()
                ->with('success','A Product has been banned');
        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please contact admin for this issue');
        }
    }

    public function getProductListAvailable($id_produk){
        $produk     = tb_produk::find($id_produk);
        $produk ->produk_status  = 1;
        $produk ->save();

        if($produk){
            return Redirect::back()
                ->with('success','A Product has been visible');
        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please contact admin for this issue');
        }
    }

    public function getProductArchive($id_produk){
        $id_produk_detail   = DB::table('tb_produk')
                                ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                                ->where('tb_produk.id_produk',$id_produk)
                                ->where('tb_produk_detail.produk_main',1)
                                ->pluck('tb_produk_detail.id_produk_detail');

        $productshow        =   DB::table('tb_produk')
                                ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                                ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
                                ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
                                ->where('tb_produk_detail.id_produk_detail',$id_produk_detail)
                                ->where('tb_produk_detail.available',1)
                                ->where('tb_produk_detail.produk_main',1)
                                ->get();

        $histories      = DB::table('tb_produk')
                            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                            ->where('tb_produk_detail.id_produk',$id_produk)
                            ->get();

        $userhistory    = DB::table('tb_produk_detail')
                            ->join('tb_users','tb_produk_detail.reversioning_by','=','tb_users.id_user')
                            ->where('tb_produk_detail.id_produk',$id_produk)
                            ->select('*','tb_users.name as reversionoffer')
                            ->get();

        return View::make('dashboard.moderator.product.productarchive')
                        ->with(array(
                            'productshow'       => $productshow,
                            'histories'         => $histories,
                            'userhistory'       => $userhistory
                        ));

    }

    public function getProductArchiveShowDetail($id_produk_detail){
        $id_produk      = DB::table('tb_produk_detail')
                            ->where('id_produk_detail',$id_produk_detail)
                            ->pluck('id_produk');

        $id_user        = DB::table('tb_produk')
                            ->where('id_produk',$id_produk)
                            ->pluck('id_user');

        $contributor    = DB::table('tb_produk')
                            ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
                            ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                            ->where('tb_produk_detail.id_produk_detail','=',$id_produk_detail)
                            ->get();

        $userhistory    = DB::table('tb_produk_detail')
                            ->join('tb_users','tb_produk_detail.reversioning_by','=','tb_users.id_user')
                            ->where('tb_produk_detail.id_produk_detail',$id_produk_detail)
                            ->select('*','tb_users.name as reversionoffer')
                            ->get();

        $product    = DB::table('tb_produk')
                        ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                        ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
                        ->where('tb_produk_detail.id_produk_detail',$id_produk_detail)
                        ->get();

        return View::make('dashboard.moderator.product.showarchive')
                    ->with(array(
                        'contributor'   => $contributor,
                        'userhistory'  => $userhistory,
                        'product'       => $product
                    ));
    }

    public function getProductListInvisible($id_produk_detail){

        $produkdetail= tb_produk_detail::find($id_produk_detail);
        $produkdetail->available = 0;
        $produkdetail->save();

        if($produkdetail){
            return Redirect::back()
                ->with('success','A Product Archive has been set invisible for user');

        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please contact admin for this issue');
        }
    }

    public function getProductListVisible($id_produk_detail){

        $produkdetail= tb_produk_detail::find($id_produk_detail);
        $produkdetail->available = 1;
        $produkdetail->save();

        if($produkdetail){
            return Redirect::back()
                ->with('success','A Product Archive has been set visible for user');

        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please contact admin for this issue');
        }
    }

    public function getNeedApproval()
    {
        $productapproval=DB::table('tb_produk')
                        ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                        ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
                        ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
                        ->where('tb_produk.produk_status','=',0)
                        ->where('tb_produk_detail.produk_main','=',2)
                        ->get(array('tb_users.id_user','tb_users.id_contributor','tb_category.category_name','tb_produk.id_produk','tb_produk.id_category','tb_produk.produk_title','tb_produk.produk_type','tb_produk_detail.id_produk_detail','tb_produk.created_at'));
        return View::make('dashboard.moderator.product.need-approval')
                            ->with('productapproval',$productapproval);
    }

    public function postApproveProduct($id_produk_detail){
        $id_produk= DB::table('tb_produk_detail')
                        ->where('id_produk_detail',$id_produk_detail)
                        ->pluck('id_produk');

        $produkdetail= tb_produk_detail::find($id_produk_detail);
        $produkdetail->available = 1;
        $produkdetail->produk_main = 1;
        $produkdetail->save();

        $produk= tb_produk::find($id_produk);
        $produk->produk_status = 1;
        $produk->save();



        $user=tb_users::find($produk->id_user);
        if ($user) {
            Mail::send('emails.products.approved', array( 'name' => $user->name), function($message) use ($user) {
                $message->to($user->email, $user->name)->subject('Product Approved');
            });
            return Redirect::route('dashboard-moderator-manageproduct-needapproval')
                ->with('success', 'A product has been approved and published');
        }

    }
    public function postDeniedProduct($id_produk_detail){
        $id_produk= DB::table('tb_produk_detail')
            ->where('id_produk_detail',$id_produk_detail)
            ->pluck('id_produk');

        $produkdetail= tb_produk_detail::find($id_produk_detail);
        $produkdetail->available = 4;
        $produkdetail->produk_main = 4;
        $produkdetail->save();

        $produk= tb_produk::find($id_produk);
        $produk->produk_status = 4;
        $produk->save();

        $user=tb_users::find($produk->id_user);
        if ($user) {
            Mail::send('emails.products.denied', array( 'name' => $user->name), function($message) use ($user) {
                $message->to($user->email, $user->name)->subject('Product Denied');
            });
            return Redirect::route('dashboard-moderator-manageproduct-needapproval')
                ->with('success', 'A product has been denied and system already sent an email to contributor as notification');
        }

    }

    public function getNeedApprovalDetails($id_produk_detail){
        $id_produk= DB::table('tb_produk_detail')
            ->where('id_produk_detail',$id_produk_detail)
            ->pluck('id_produk');

        $id_user    = DB::table('tb_produk')
                        ->where('id_produk',$id_produk)
                        ->pluck('id_user');
        $contributor= DB::table('tb_produk')
                        ->join('tb_users','tb_produk.id_user','=','tb_users.id_user')
                        ->groupBy('tb_users.id_user')
                        ->get();
        $product    = DB::table('tb_produk')
                        ->join('tb_produk_detail','tb_produk.id_produk','=','tb_produk_detail.id_produk')
                        ->join('tb_category','tb_produk.id_category','=','tb_category.id_category')
                        ->where('tb_produk.id_produk',$id_produk)
                        ->get();

        return View::make('dashboard.moderator.product.productdetails')
                        ->with(array(
                            'id_user'       =>$id_user,
                            'contributor'   =>$contributor,
                            'product'       =>$product
                        ));
    }
    public function getReversioningApproval()
    {
        $reversioning   = DB::table('tb_reversioning')
                            ->join('tb_produk','tb_produk.id_produk','=','tb_reversioning.id_produk')
                            ->join('tb_users','tb_users.id_user','=','tb_reversioning.id_user_offer')
                            ->where('tb_reversioning.reversioning_produk_status','!=',1)
                            ->where('tb_reversioning.reversioning_produk_status','!=',4)
                            ->orderBy('tb_reversioning.updated_at','desc')
                            ->get();
        return View::make('dashboard.moderator.product.reversioning')
                            ->with(
                                'reversioning',$reversioning
                            );
    }

    public function getReversioningApprovalDetails($id_reversioning){

        $id_produk      = DB::table('tb_reversioning')
                            ->where('id_reversioning',$id_reversioning)
                            ->pluck('id_produk');

        $owner        = DB::table('tb_reversioning')
                            ->join('tb_users','tb_reversioning.id_user_owner','=','tb_users.id_user')
                            ->where('tb_reversioning.id_reversioning',$id_reversioning)
                            ->get();

        $offer        = DB::table('tb_reversioning')
                            ->join('tb_users','tb_reversioning.id_user_offer','=','tb_users.id_user')
                            ->where('tb_reversioning.id_reversioning',$id_reversioning)
                            ->get();

        $product        = DB::table('tb_reversioning')
                            ->join('tb_produk','tb_produk.id_produk','=','tb_reversioning.id_produk')
                            ->join('tb_category','tb_reversioning.id_category','=','tb_category.id_category')
                            ->where('tb_reversioning.id_reversioning',$id_reversioning)
                            ->get();

        return View::make('dashboard.moderator.product.reversioningdetails')
            ->with(array(
                'owner'         => $owner,
                'offer'         => $offer,
                'product'       => $product
            ));
    }
    public function getReversioningFileModerator($produk_link){
        $filereversion  = DB::table('tb_reversioning')
            ->where('produk_link',$produk_link)
            ->pluck('produk_file');

        return Redirect::to($filereversion);
    }

    public function postApproveReversioning($id_reversioning){
        $reversioning   = tb_reversioning::find($id_reversioning);
        $reversioning->reversioning_produk_status=1;
        $reversioning->save();

        $id_produk  = DB::table('tb_reversioning')
                        ->where('id_reversioning',$id_reversioning)
                        ->pluck('id_produk');

        $revdata    = DB::table('tb_reversioning')
                        ->where('id_reversioning',$id_reversioning)
                        ->first();

        $offerinfo  = DB::table('tb_users')
                        ->where('id_user',$revdata->id_user_offer)
                        ->first();

        $ownerinfo  = DB::table('tb_users')
                        ->where('id_user',$revdata->id_user_owner)
                        ->first();

        $changemainversion  = DB::table('tb_produk_detail')
                                ->where('id_produk',$id_produk)
                                ->where('produk_main',1)
                                ->update(array(
                                    'produk_main'  => 0
                                ));

        $product_detail = tb_produk_detail::create(array(
            'id_produk'             => $id_produk,
            'id_user'               => $revdata->id_user_owner ,
            'reversioning_by'       => $revdata->id_user_offer ,
            'produk_ava'            => $revdata->produk_ava,
            'produk_introduction'   => $revdata->produk_introduction,
            'produk_file'           => $revdata->produk_file,
            'produk_link'           => $revdata->produk_link,
            'produk_version'        => $revdata->produk_version,
            'produk_pict_1'         => $revdata->produk_pict_1,
            'produk_pict_2'         => $revdata->produk_pict_2,
            'produk_pict_3'         => $revdata->produk_pict_3,
            'produk_pict_4'         => $revdata->produk_pict_4,
            'produk_pict_5'         => $revdata->produk_pict_5,
            'produk_video_youtube'  => $revdata->produk_video_youtube,
            'produk_desc'           => $revdata->produk_desc,
            'available'             => 1,
            'produk_main'           => 1

        ));

        if($product_detail){

            Mail::send('emails.products.offerreversioningapproved',array('name'=>$offerinfo->name),function($message) use ($offerinfo){
                $message->to($offerinfo->email,$offerinfo->name)->subject('Reversioning Approved');
            });
            Mail::send('emails.products.ownerreversioningapproved',array('name'=>$ownerinfo->name),function($message) use ($ownerinfo){
                $message->to($ownerinfo->email,$ownerinfo->name)->subject('Product has been Modified');
            });
            return Redirect::back()
                ->with('success','You have been approve reversioning and system has been updated');
        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please check you last activity and report to Administrator');
        }




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

        $ownerinfo  = DB::table('tb_users')
            ->where('id_user',$revdata->id_user_owner)
            ->first();

        if($reversioning){

            Mail::send('emails.products.reversioningdeniedmoderator',array('name'=>$offerinfo->name),function($message) use ($offerinfo){
                $message->to($offerinfo->email,$offerinfo->name)->subject('Reversioning Denied');
            });
            Mail::send('emails.products.reversioningdeniedmoderator',array('name'=>$ownerinfo->name),function($message) use ($ownerinfo){
                $message->to($ownerinfo->email,$ownerinfo->name)->subject('Reversioning Denied');
            });
            return Redirect::back()
                ->with('success','You has been deny reversioning');
        }else{
            return Redirect::back()
                ->with('failed','Something wrong,please check you last activity and report to Administrator');
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