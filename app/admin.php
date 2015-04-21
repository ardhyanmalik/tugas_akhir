<?php


Route::get('/dashboard-administrator/account/setting', array(
    'as'=>'administrator-account-setting',
    'uses'=>'AdminController@getAccountSetting'

)); 

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/admin/account-information/{id_user}',array(
        'as'=>'administrator-account-setting-update-accouninfo',
        'uses'=>'AdminController@postUpdateAccountInfoAdmin'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/admin/changepassword/{id_user}',array(
        'as'=>'administrator-account-setting-update-changepassword',
        'uses'=>'AdminController@postUpdatePassword'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/admin/socialinfo/{id_user}',array(
        'as'=>'administrator-account-setting-update-socialinfo',
        'uses'=>'AdminController@postUpdateSocialInfo'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/admin/profpict/{id_user}',array(
        'as'=>'administrator-account-setting-update-profpict',
        'uses'=>'AdminController@postUpdateProfpict'
    ));
});
 
/* 
|--------------------------------------------------------------------------
| Messages
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-administrator/messages/inbox', array(
    'as'=>'dashboard-administrator-messages-inbox',
    'uses'=>'AdminController@getAdminMessagesInbox'
));
Route::get('/dashboard-administrator/messages/sendbox', array(
    'as'=>'dashboard-administrator-messages-sendbox',
    'uses'=>'AdminController@getAdminMessagesSendbox'
));

Route::get('/dashboard-administrator/messages/compose', array(
    'as' => 'dashboard-administrator-messages-compose',
    'uses' => 'AdminController@getAdminMessages'
));

Route::get('/dashboard-administrator/messages/{id_message}',array(
    'as'    => 'dashboard-administrator-messages',
    'uses'  => 'AdminController@getDataMessages'
));

Route::post('/messages-admin/create',array(
        'as'=>'messages-admin-create',
        'uses'=>'AdminController@insertMessage'
));


/*
|--------------------------------------------------------------------------
| Manage Products
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-administrator/product-list', array(
    'as'=>'dashboard-administrator-product-list',
    'uses'=>'AdminController@getProductList'
));
Route::get('/dashboard-administrator/categories-list', array(
    'as'=>'dashboard-administrator-categories-list',
    'uses'=>'AdminController@getCategoriesList'
));
 
/*
|--------------------------------------------------------------------------
| Manage Users
|--------------------------------------------------------------------------
*/
/*Admin*/
Route::get('/dashboard-administrator/datamaster/administrator',array(
    'as'=>'dashboard-administrator-datamaster-admin',
    'uses'=>'AdminController@getDataMasterAdmin'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/create/administrator',array(
        'as'=>'account-create-administrator-post',
        'uses'=>'AdminController@postCreateAdministrator'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/edit/administrator/{id_user}',array(
        'as'=>'account-edit-administrator-post',
        'uses'=>'AdminController@postEditAdministrator'
    ));
});
Route::get('/account/banned/administrator/{id_user}', array(
    'as'    => 'account-banned-administrator-post',
    'uses'  => 'AdminController@postBannedAdministrator'
));
Route::get('/account/delete/admin/{id_user}',array(
    'as'    =>'account-delete-administrator-post',
    'uses'  =>'AdminController@postDeleteAdministrator'
));


/*Moderator*/
Route::get('/dashboard-administrator/datamaster/moderator',array(
    'as'=>'dashboard-administrator-datamaster-moderator',
    'uses'=>'AdminController@getDataMasterModerator'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/create/moderator',array(
        'as'=>'account-create-moderator-post',
        'uses'=>'AdminController@postCreateModerator'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/edit/moderator/{id_user}',array(
        'as'=>'account-edit-moderator-post',
        'uses'=>'AdminController@postEditModerator'
    ));
});
Route::get('/account/banned/moderator/{id_user}', array(
    'as'    => 'account-banned-moderator-post',
    'uses'  => 'AdminController@postBannedModerator'
));
Route::get('/account/delete/moderator/{id_user}',array(
    'as'    =>'account-delete-moderator-post',
    'uses'  =>'AdminController@postDeleteModerator'
));



/*Contributor*/
Route::get('/dashboard-administrator/datamaster/contributor',array(
    'as'=>'dashboard-administrator-datamaster-contributor',
    'uses'=>'AdminController@getDataMasterContributor'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/create/contributor',array(
        'as'    => 'account-create-contributor-post',
        'uses'  => 'AdminController@postCreateContributor'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/edit/contributor/{id_user}',array(
        'as'=>'account-edit-contributor-post',
        'uses'=>'AdminController@postEditContributor'
    ));
});
Route::get('/account/banned/contributor/{id_user}', array(
    'as'    => 'account-banned-contributor-post',
    'uses'  => 'AdminController@postBannedContributor'
));
Route::get('/account/delete/Contributor/{id_user}',array(
    'as'    =>'account-delete-contributor-post',
    'uses'  =>'AdminController@postDeleteContributor'
));


/*Guest*/
Route::get('/dashboard-administrator/datamaster/guest',array(
    'as'=>'dashboard-administrator-datamaster-guest',
    'uses'=>'AdminController@getDataMasterGuest'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/create/guest',array(
        'as'=>'account-create-guest-post',
        'uses'=>'AdminController@postCreateGuest'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/edit/guest/{id_user}',array(
        'as'=>'account-edit-guest-post',
        'uses'=>'AdminController@postEditGuest'
    ));
});
Route::get('/account/banned/guest/{id_user}', array(
    'as'    => 'account-banned-guest-post',
    'uses'  => 'AdminController@postBannedGuest'

));
Route::get('/account/delete/guest/{id_user}',array(
    'as'    =>'account-delete-guest-post',
    'uses'  =>'AdminController@postDeleteGuest'
));

/*Sales*/
Route::get('/dashboard-administrator/datamaster/sales',array(
    'as'=>'dashboard-administrator-datamaster-sales',
    'uses'=>'AdminController@getDataMasterSales'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/create/Sales',array(
        'as'=>'account-create-sales-post',
        'uses'=>'AdminController@postCreateSales'
    ));
});

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/edit/administrator/{id_user}',array(
        'as'=>'account-edit-sales-post',
        'uses'=>'AdminController@postEditSales'
    ));
});
Route::get('/account/banned/administrator/{id_user}', array(
    'as'    => 'account-banned-sales-post',
    'uses'  => 'AdminController@postBannedAdministrator'
));
Route::get('/account/delete/admin/{id_user}',array(
    'as'    =>'account-delete-sales-post',
    'uses'  =>'AdminController@postDeleteAdministrator'
));

/*Payment*/
Route::get('/dashboard-administrator/datamaster/payment',array(
    'as'=>'dashboard-administrator-datamaster-payment',
    'uses'=>'AdminController@getDataMasterPayment'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/create/payment',array(
        'as'=>'account-create-payment-post',
        'uses'=>'AdminController@postCreatePayment'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account/edit/payment/{id_user}',array(
        'as'=>'account-edit-payment-post',
        'uses'=>'AdminController@postEditPayment'
    ));
});
Route::get('/account/banned/payment/{id_user}', array(
    'as'    => 'account-banned-payment-post',
    'uses'  => 'AdminController@postBannedPayment'
));
Route::get('/account/delete/payment/{id_user}',array(
    'as'    =>'account-delete-payment-post',
    'uses'  =>'AdminController@postDeletePayment'
));















