<?php
Route::get('/dashboard-contributor/account/setting', array(
    'as'=>'contributor-account-setting',
    'uses'=>'ContributorController@getAccountSetting'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/contributor/account-information/{id_user}',array(
        'as'=>'contributor-account-setting-update-accouninfo',
        'uses'=>'ContributorController@postUpdateAccountInfoContributor'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/contributor/changepassword/{id_user}',array(
        'as'=>'contributor-account-setting-update-changepassword',
        'uses'=>'ContributorController@postUpdatePassword'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/contributor/socialinfo/{id_user}',array(
        'as'=>'contributor-account-setting-update-socialinfo',
        'uses'=>'ContributorController@postUpdateSocialInfo'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/contributor/profpict/{id_user}',array(
        'as'=>'contributor-account-setting-update-profpict',
        'uses'=>'ContributorController@postUpdateProfpict'
    ));
});
 
/*
|--------------------------------------------------------------------------
| Manage Messages
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-contributor/messages/inbox', array(
    'as'=>'dashboard-contributor-messages-inbox',
    'uses'=>'ContributorController@getContributorMessagesInbox'
));
Route::get('/dashboard-contributor/messages/sendbox', array(
    'as'=>'dashboard-contributor-messages-sendbox',
    'uses'=>'ContributorController@getContributorMessagesSendbox'
));
Route::get('/dashboard-contributor/messages/compose', array(
    'as' => 'dashboard-contributor-messages-compose',
    'uses' => 'ContributorController@getContributorMessages'
));
 
Route::post('/messages-contributor/create',array(
        'as'=>'messages-contributor-create',
        'uses'=>'ContributorController@insertMessage'
));
 
/* 
|--------------------------------------------------------------------------
| Manage Product
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-contributor/ownproduct', array(
    'as'=>'dashboard-contributor-ownproduct',
    'uses'=>'ContributorController@getOwnProduct'
));

Route::get('/dashboard-contributor/product-status', array(
	'as'=>'dashboard-contributor-product-status',
	'uses'=>'ContributorController@getProductStatus'
));

Route::get('/dashboard-contributor/manageproduct/addpremium',array(
	'as'=>'dashboard-contributor-manageproduct-addpremium',
	'uses'=>'ContributorController@getAddPremiumProduct'
));

Route::group(array('before'=>'csrf'), function (){
    Route::post('/dashboard/contributor/manageproduct/postpremiumproduct/{id_user}', array(
        'as'    => 'dashboard-contributor-manageproduct-postpremium',
        'uses'  => 'ContributorController@postAddPremiumProduct'
    ));
});

Route::get('/dashboard-contributor/manageproduct/addfreemium', array(
    'as'    =>'dashboard-contributor-manageproduct-addfreemium',
    'uses'  =>'ContributorController@getAddFreemiumProduct'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('dashboard/contributor/manageproduct/postfreemiumproduct/{id_user}',array(
        'as'=>'dashboard-contributor-manageproduct-postfreemium',
        'uses'=>'ContributorController@postAddFreemiumProduct'
    ));
});

Route::get('/dashboard-contributor/manageproduct/reversioningstatus', array(
    'as'=>'dashboard-contributor-manageproduct-reversioning-status',
    'uses'=>'ContributorController@getReversioningStatus'
));

Route::get('/dashboard-contributor/manageproduct/reversioningdetails/{id_reversioning}', array(
    'as'=>'dashboard-contributor-manageproduct-reversioning-details',
    'uses'=>'ContributorController@getReversioningDetails'
));

Route::get('/dashboard-contributor/manageproduct/reversioningdetails/{id_reversioning}/approve',array(
    'as'    =>'dashboard-contributor-manageproduct-reversioning-approve',
    'uses'  =>'ContributorController@postApproveReversioning'
));

Route::get('/dashboard-contributor/manageproduct/reversioningdetails/{id_reversioning}/deny',array(
    'as'    =>'dashboard-contributor-manageproduct-reversioning-deny',
    'uses'  =>'ContributorController@postDenyReversioning'
));
Route::get('/dashboard-contributor/reversioning/file/download/{produk_link}',array(
    'as'	=>'reversioning-file',
    'uses'	=>'ContributorController@getReversioningFile'
));


/*
|--------------------------------------------------------------------------
| Purchased Product
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-contributor/manage-product/purchased-approval', array(
    'as'    => 'dashboard-contributor-manageproduct-purchased-approval',
    'uses'  => 'ContributorController@getPurchaseProductContributor'
));

Route::get('/dashboard-contributor/manage-product/approve-purchase/{id_transaksi}', array(
    'as'    => 'dashboard-contributor-manageproduct-approve-purchase',
    'uses'  => 'ContributorController@postApprovePurchase'
));
Route::get('/dashboard-contributor/manage-product/denny-purchase/{id_transaksi}', array(
    'as'    => 'dashboard-contributor-manageproduct-denny-purchase',
    'uses'  => 'ContributorController@postBannedPurchase'
));
/*
|--------------------------------------------------------------------------
| Reversioning Product
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-contributor/manage-product/reversioning',array(
    'as'=>'dashboard-contributor-manageproduct-reversioning',
    'uses'=>'ContributorController@getReversioning'
));

Route::get('/dashboard-contributor/manage-product/reversioning/search',array(
    'as'=>'dashboard-contributor-manageproduct-reversioning-search',
    'uses'=>'ContributorController@getSearchProduct'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/dashboard-contributor/manageproduct/postAddVersioning/{id_user}',array(
        'as'=>'dashboard-contributor-manageproduct-postreversioning',
        'uses'=>'ContributorController@postAddVersioning'
    ));
});