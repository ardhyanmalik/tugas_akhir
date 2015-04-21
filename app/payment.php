<?php
/*
|--------------------------------------------------------------------------
| Account Setting
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-payment/account/setting', array(
    'as'=>'payment-account-setting',
    'uses'=>'PaymentController@getAccountSetting'

));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/payment/account-information/{id_user}',array(
        'as'=>'payment-account-setting-update-accouninfo',
        'uses'=>'PaymentController@postUpateAccountInfoPayment'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/payment/changepassword/{id_user}',array(
        'as'=>'payment-account-setting-update-changepassword',
        'uses'=>'PaymentController@postUpdatePassword'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/payment/socialinfo/{id_user}',array(
        'as'=>'payment-account-setting-update-socialinfo',
        'uses'=>'PaymentController@postUpdateSocialInfo'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/payment/profpict/{id_user}',array(
        'as'=>'payment-account-setting-update-profpict',
        'uses'=>'PaymentController@postUpdateProfpict'
    ));
});

/* 
|--------------------------------------------------------------------------
| Product/Payment
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-payment/manage-payment/confirm-payment',array(
        'as'    => 'dashboard-payment-manage-payment-confirm-payment',
        'uses'  => 'PaymentController@getConfirmPaymentUser'
));
Route::get('/dashboard-payment/payment-confirm/{id_konfirmasi}',array(
    'as'    => 'dashboard-payment-confirm-post',
    'uses'  => 'PaymentController@postConfirmPayment'
));
/* 
|--------------------------------------------------------------------------
| Messages
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-payment/messages/inbox', array(
    'as'=>'dashboard-payment-messages-inbox',
    'uses'=>'PaymentController@getPaymentMessagesInbox'
));
Route::get('/dashboard-payment/messages/sendbox', array(
    'as'=>'dashboard-payment-messages-sendbox',
    'uses'=>'PaymentController@getPaymentMessagesSendbox'
));
Route::get('/dashboard-payment/messages/compose', array(
    'as' => 'dashboard-payment-messages-compose',
    'uses' => 'PaymentController@getPaymentMessages'
));
Route::post('/messages-payment/create',array(
        'as'=>'messages-payment-create',
        'uses'=>'PaymentController@insertMessage'
));
