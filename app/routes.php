<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Subscribes
|--------------------------------------------------------------------------
|
*/
Route::group(array('before'=>'csrf'),function(){
    Route::post('/create/subscribe',array(
        'as'=>'account-subscribe',
        'uses'=>'HomeController@postAccountSubscribe'
    ));
});
/*
|--------------------------------------------------------------------------
| Unauthenticated Users
|--------------------------------------------------------------------------
|
*/

/*MESSAGES*/

Route::post('/insert-message', array(
    'as' => 'insert-message',
    'uses' => 'AdminController@insertMessage'
));

Route::post('/insert-message', array(
    'as' => 'insert-message',
    'uses' => 'ContributorController@insertMessage'
));

Route::post('/insert-message', array(
    'as' => 'insert-message',
    'uses' => 'ModeratorController@insertMessage'
));

/*END OF MESSAGES*/

Route::get('/', array(
    'as'=>'landingpage',
    'uses'=>'HomeController@landingpage'
));
Route::get('/home', array(
    'as'=>'homepage',
    'uses'=>'HomeController@homepage'
));
Route::get('/products/product-list', array(
    'as'=>'product-list',
    'uses'=>'HomeController@getProductList'
));

Route::get('/products/product-list/freemium', array(
    'as'=>'product-list-showmore-freemium',
    'uses'=>'HomeController@getProductListFreemium'
));

Route::get('/products/category/{id_category}', array(
    'as'=>'product-category-link',
    'uses'=>'HomeController@getProductListCategory'
));

Route::get('/products/product-list/history/{id_produk}', array(
    'as'=>'product-list-history',
    'uses'=>'HomeController@getProductHistory'
));

Route::get('/products/premium-products', array(
    'as'=>'premium-products',
    'uses'=>'HomeController@getPremiumProducts'
));
Route::get('/products/premium-products/details/{id_produk_detail}', array(
    'as'=>'products-premium-products-details',
    'uses'=>'HomeController@getProductDetailsPremium'
));
Route::get('/products/premium-products/purchase/{id_produk}', array(
    'as'=>'products-premium-products-purchase',
    'uses'=>'HomeController@getPremiumProductsPurchase'
));
Route::get('/products/product-details/{id_produk}', array(
    'as'=>'product-details',
    'uses'=>'HomeController@getProductDetails'
));
Route::get('/products/premium-product/productcart/{id_produk}', array(
    'as'    => 'products-product-cart',
    'uses'  => 'HomeController@getPremiumProductsChart'
));

Route::get('/product/view/productcart', array(
    'as'    => 'view-product-cart',
    'uses'  => 'HomeController@getViewProductsChart'
));


Route::post('/products/productcart/delete/{id_produk}',array(
    'as'    => 'productcart-delete',
    'uses'  => 'HomeController@postDeleteProductChart'
));
Route::get('/products/premium-products/checkout', array(
    'as'=>'products-premium-products-checkout',
    'uses'=> 'HomeController@getPremiumProductsCheckout'
));

Route::get('/products/premium-product/checkout_shop/{id_nomor_transaksi}', array(
    'as'    => 'products-premium-products-checkout-shop',
    'uses'  => 'HomeController@getViewCheckout'
));

Route::get('/account/sign-in', array(
    'as'=>'account-sign-in',
    'uses'=>'HomeController@getAccountSignin'
));

Route::get('/account/forgotpasssword', array(
    'as'=>'account-forgot-password',
    'uses'=>'HomeController@getForgotPassword'
));

Route::get('/account/recover/{code}',array(
    'as'=>'account-recover',
    'uses'=>'HomeController@getRecover'
));

Route::get('/account/create-account', array(
    'as'=>'account-create-account',
    'uses'=>'HomeController@getCreateAccount'
));
Route::get('/FAQ', array(
    'as'=>'FAQ',
    'uses'=>'HomeController@getFAQ'
));
Route::get('/users/profile/username', array(
    'as'=>'users-profile',
    'uses'=>'HomeController@getProfile'
));

Route::get('/account/active/{code}',array(
    'as'	=>'account-active',
    'uses'	=>'HomeController@getActive'
));


Route::get('/product/transaction/confirm-payment', array(
    'as'   => 'product-transaction-confirm-payment',
    'uses' => 'HomeController@getConfirmPayment'
));

Route::post('/product/transaction/post/confirm/{id_konfirmasi}', array(
    'as'    => 'product-transaction-post-confirm',
    'uses'  => 'HomeController@postConfirmPayment'
));



/*
|--------------------------------------------------------------------------
| Authenticated Users
|--------------------------------------------------------------------------
*/
Route::get('twitterAuth/{auth?}',array(
    'as'=>'twitterAuth',
    'uses'=>'HomeController@getTwitterLogin'
));

Route::get('fbauth/{auth?}',array(
    'as'=>'facebookAuth',
    'uses'=>'HomeController@getFacebookLogin'
));


Route::get('gauth/{auth?}',array(
    'as'=>'googleAuth',
    'uses'=>'HomeController@getGoogleLogin'
));

Route::get('logout',array('as'=>'logout','uses'=>'HomeController@getLoggedOut'));

/*
|--------------------------------------------------------------------------
| Products Action
|--------------------------------------------------------------------------
*/

Route::get('/product/download/{produk_link}',array(
    'as'	=>'download-freemium',
    'uses'	=>'HomeController@getDownload'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/product/postratereview/{id_user}',array(
        'as'=>'post-rate-review',
        'uses'=>'HomeController@postRateReview'
    ));
});

/*
|--------------------------------------------------------------------------
| Register , Sign-in , Forgot Password Post
|--------------------------------------------------------------------------
*/
Route::group(array('before'=>'guest'),function(){

    Route::group(array('before'=>'csrf'),function(){
        Route::post('/account/create',array(
            'as'=>'account-create-post',
            'uses'=>'HomeController@postCreate'
        ));
    });

    Route::post('/account/sign-in',array(
        'as'=>'account-sign-in-post',
        'uses'=>'HomeController@postSignIn'
    ));

    Route::post('/account/forgotpassword/sent',array(
        'as'=>'account-forgotpassword-post',
        'uses'=>'HomeController@postForgotPassword'
    ));

});

/*
|--------------------------------------------------------------------------
| Access-ing Users Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-administrator', array(
    'as' => 'dashboard-administrator',
    'before'=>'permission',
    'uses' => 'AdminController@getAdminDashboard'
));
Route::get('/dashboard-moderator', array(
    'as' => 'dashboard-moderator',
    'before'=>'permission',
    'uses' => 'ModeratorController@getModeratorDashboard'
));

Route::get('/dashboard-contributor', array(
    'as' => 'dashboard-contributor',
    'before'=>'permission',
    'uses' => 'ContributorController@getContributorDashboard'
));
Route::get('/dashboard-guest', array(
    'as' => 'dashboard-guest',
    'before'=>'permission',
    'uses' => 'GuestController@getGuestDashboard'
));
Route::get('/dashboard-sales', array(
    'as' => 'dashboard-sales',
    'before'=>'permission',
    'uses' => 'SalesController@getSalesDashboard'
));
Route::get('/dashboard-payment', array(
    'as' => 'dashboard-payment',
    'before'=>'permission',
    'uses' => 'PaymentController@getPaymentDashboard'
));

/*
|--------------------------------------------------------------------------
| Advance Search
|--------------------------------------------------------------------------
*/
Route::get('/home/search/', array(
    'as'   => 'advance-search',
    'uses' => 'HomeController@postAdvanceSearch'
));


/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
*/
@include "admin.php";
@include "moderator.php";
@include "contributor.php";
@include "guest.php";
@include "sales.php";
@include "payment.php";
