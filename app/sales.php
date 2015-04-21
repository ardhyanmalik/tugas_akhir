<?php

/*
|--------------------------------------------------------------------------
| Account Setting
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-sales/account/setting', array(
    'as'=>'dashboard-account-setting',
    'uses'=>'SalesController@getAccountSetting'

));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/sales/account-information/{id_user}',array(
        'as'=>'sales-account-setting-update-accouninfo',
        'uses'=>'SalesController@postUpdateAccountInfoSales'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/sales/changepassword/{id_user}',array(
        'as'=>'sales-account-setting-update-changepassword',
        'uses'=>'SalesController@postUpdatePassword'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/sales/socialinfo/{id_user}',array(
        'as'=>'sales-account-setting-update-socialinfo',
        'uses'=>'SalesController@postUpdateSocialInfo'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/sales/profpict/{id_user}',array(
        'as'=>'sales-account-setting-update-profpict',
        'uses'=>'SalesController@postUpdateProfpict'
    ));
});




/* 
|--------------------------------------------------------------------------
| Messages
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-sales/messages/inbox', array(
    'as'=>'dashboard-sales-messages-inbox',
    'uses'=>'SalesController@getSalesMessagesInbox'
));
Route::get('/dashboard-sales/messages/sendbox', array(
    'as'=>'dashboard-sales-messages-sendbox',
    'uses'=>'SalesController@getSalesMessagesSendbox'
));
Route::get('/dashboard-sales/messages/compose', array(
    'as' => 'dashboard-sales-messages-compose',
    'uses' => 'SalesController@getSalesMessages'
));

Route::post('/messages-sales/create',array(
        'as'=>'messages-sales-create',
        'uses'=>'SalesController@insertMessage'
));


/* 
|--------------------------------------------------------------------------
| Manage Sales
|--------------------------------------------------------------------------
*/

Route::get('/need-approval/{id_produk}', array(
    'as'    => 'sales-need-approval-produk',
    'uses'  => 'SalesController@postSalesApprove'
));
Route::get('/banned-produk/{id_produk}', array(
    'as'    => 'banned-produk',
    'uses'  => 'SalesController@postSalesBanned'
));
Route::get('/dashboard-sales/purchase/need-approval', array(
    'as'    => 'dashboard-sales-purchase-need-approval',
    'uses'  => 'SalesController@getSalesPurchaseApproval'
));
Route::get('/approval-contributor/purchase/post/{id_transaksi}',array(
    'as'    => 'post-approval-contributor-purchase',
    'uses'  => 'SalesController@postPurchaseNeedApproval'
));