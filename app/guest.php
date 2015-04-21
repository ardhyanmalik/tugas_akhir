<?php
Route::get('/dashboard-guest/account/setting', array(
    'as'=>'guest-account-setting',
    'uses'=>'GuestController@getAccountSetting'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/guest/account-information/{id_user}',array(
        'as'=>'guest-account-setting-update-accouninfo',
        'uses'=>'GuestController@postUpdateAccountInfoGuest'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/guest/changepassword/{id_user}',array(
        'as'=>'guest-account-setting-update-changepassword',
        'uses'=>'GuestController@postUpdatePassword'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/guest/socialinfo/{id_user}',array(
        'as'=>'guest-account-setting-update-socialinfo',
        'uses'=>'GuestController@postUpdateSocialInfo'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/guest/profpict/{id_user}',array(
        'as'=>'guest-account-setting-update-profpict',
        'uses'=>'GuestController@postUpdateProfpict'
    ));
}); 
/* 
|--------------------------------------------------------------------------
| Messages
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-guest/messages/inbox', array(
    'as'=>'dashboard-guest-messages-inbox',
    'uses'=>'GuestController@getGuestMessagesInbox'
));
Route::get('/dashboard-guest/messages/sendbox', array(
    'as'=>'dashboard-guest-messages-sendbox',
    'uses'=>'GuestController@getGuestMessagesSendbox'
));
Route::get('/dashboard-guest/messages/compose', array(
    'as' => 'dashboard-guest-messages-compose',
    'uses' => 'GuestController@getGuestMessages'
));

Route::post('/messages-guest/create',array(
        'as'=>'messages-guest-create',
        'uses'=>'GuestController@insertMessage'
));
 
/*
 |--------------------------------------------------------------------------
 | Manage Product
 |--------------------------------------------------------------------------
*/


Route::get('/dashboard-guest/manage-product/reversioning',array(
    'as'=>'dashboard-manageproduct-reversioning',
    'uses'=>'GuestController@getReversioning'
));
Route::get('/dashboard-guest/manage-product/reversioning/search',array(
    'as'=>'dashboard-manageproduct-reversioning-search',
    'uses'=>'GuestController@getSearchProduct'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/dashboard-guest/manageproduct/postAddVersioning/{id_user}',array(
        'as'=>'dashboard-guest-manageproduct-postreversioning',
        'uses'=>'GuestController@postAddVersioning'
    ));
});
Route::get('/dashboard-guest/manage-product/purchased-product',array(
    'as'        => 'dashboard-guest-manage-product-purchased-product',
    'uses'       => 'GuestController@getGuestPurchasedProduct'
));

/*
 |--------------------------------------------------------------------------
 | Purchased Product
 |--------------------------------------------------------------------------
*/

 Route::get('/products/premium-products/purchase-products', array(
    'as'=>'products-premium-products-purchase-products',
    'uses'=>'GuestController@getGuestPurchaseProduct'
));

Route::get('/product/cart/{id_produk}',array(
    'as'    => 'product-add-to-chart',
    'uses'  => 'GuestController@postGuestAddChart'
));

Route::get('/product/transaction/confirm-payment', array(
    'as'   => 'product-transaction-confirm-payment',
    'uses' => 'GuestController@getGuestConfirmPayment'
));

Route::post('/product/transaction/post/confirm/{id_konfirmasi}', array(
    'as'    => 'product-transaction-post-confirm',
    'uses'  => 'GuestController@postGuestConfirmPayment'
));