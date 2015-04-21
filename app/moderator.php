<?php
 
Route::get('/dashboard-moderator/account/setting', array(
    'as'=>'moderator-account-setting',
    'uses'=>'ModeratorController@getAccountSetting'
));

Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/moderator/account-information/{id_user}',array(
        'as'=>'moderator-account-setting-update-accouninfo',
        'uses'=>'ModeratorController@postUpdateAccountInfoModerator'
    ));
}); 
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/moderator/changepassword/{id_user}',array(
        'as'=>'moderatoraccount-setting-update-changepassword',
        'uses'=>'ModeratorController@postUpdatePassword'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/moderator/socialinfo/{id_user}',array(
        'as'=>'moderator-account-setting-update-socialinfo',
        'uses'=>'ModeratorController@postUpdateSocialInfo'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/account-setting/moderator/profpict/{id_user}',array(
        'as'=>'moderator-account-setting-update-profpict',
        'uses'=>'ModeratorController@postUpdateProfpict'
    ));
});
Route::get('/dashboard-moderator/user-status', array(
    'as'=>'dashboard-moderator-user-status',
    'uses'=>'ModeratorController@getModeratorUserStatus'
));
/*
 |--------------------------------------------------------------------------
 | Manage Category
 |--------------------------------------------------------------------------
*/
Route::get('/dashboard-moderator/content/categories',array(
    'as'=>'dashboard-moderator-content-categories',
    'uses'=>'ModeratorController@getContentCategories'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/dashboard-moderator/content/categories/addcategory',array(
        'as'=>'dashboard-moderator-content-categories-addcategory',
        'uses'=>'ModeratorController@postContentCategories'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/dashboard-moderator/content/categories/updatecategory/{id_category}',array(
        'as'=>'dashboard-moderator-content-categories-updatecategory',
        'uses'=>'ModeratorController@postEditCategory'
    ));
});
Route::get('/dashboard-moderator/content/categories/bancategory/{id_category}', array(
    'as'    => 'dashboard-moderator-content-categories-bancategory',
    'uses'  => 'ModeratorController@postBannedCategory'
));
Route::get('/dashboard-moderator/content/categories/deletecategory/parent/{id_category}',array(
    'as'    =>'dashboard-moderator-content-categories-deletecategory-parent',
    'uses'  =>'ModeratorController@postDeleteParentCategory'
));
Route::get('/dashboard-moderator/content/categories/deletecategory/{id_category}',array(
    'as'    =>'dashboard-moderator-content-categories-deletecategory',
    'uses'  =>'ModeratorController@postDeleteCategory'
));
Route::get('/dashboard-moderator/content/categories/details/{id_category}',array(
    'as'=>'dashboard-moderator-content-categories-details',
    'uses'=>'ModeratorController@getCategoryDetails'
));
Route::group(array('before'=>'csrf'),function(){
    Route::post('/dashboard-moderator/content/categories/sub-category/addcategory/{id_category}',array(
        'as'=>'dashboard-moderator-content-categories-subcategory-addcategory',
        'uses'=>'ModeratorController@postSubCategories'
    ));
});
Route::group(array('before'=>'csrf'),function(){
    Route::post('/dashboard-moderator/content/categories/updatesubcategory/{id_category}',array(
        'as'=>'dashboard-moderator-content-categories-updatesubcategory',
        'uses'=>'ModeratorController@postEditSubCategory'
    ));
});
 
/*
|--------------------------------------------------------------------------
| Messages
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-moderator/messages/inbox', array(
    'as'=>'dashboard-moderator-messages-inbox',
    'uses'=>'ModeratorController@getModeratorMessagesInbox'
));
Route::get('/dashboard-moderator/messages/sendbox', array(
    'as'=>'dashboard-moderator-messages-sendbox',
    'uses'=>'ModeratorController@getModeratorMessagesSendbox'
));

Route::get('/dashboard-moderator/messages/compose', array(
    'as' => 'dashboard-moderator-messages-compose',
    'uses' => 'ModeratorController@getModeratorMessages'
));
Route::get('/dashboard-moderator/messages', array(
    'as' => 'dashboard-moderator-messages',
    'uses'=> 'ModeratorController@getMessages'
));

/*
 |--------------------------------------------------------------------------
 | Manage Product
 |--------------------------------------------------------------------------

*/
Route::get('/dashboard-moderator/manageproduct/product-list', array(
    'as'=>'dashboard-moderator-manageproduct-product-list',
    'uses'=>'ModeratorController@getProductList'
));

Route::get('/dashboard-moderator/manageproduct/product-list/{id_produk}/banned',array(
    'as'=>'dashboard-moderator-manageproduct-product-list-banned',
    'uses'=>'ModeratorController@getProductListBanned'
));

Route::get('/dashboard-moderator/manageproduct/product-list/{id_produk}/available',array(
    'as'=>'dashboard-moderator-manageproduct-product-list-available',
    'uses'=>'ModeratorController@getProductListAvailable'
));

Route::get('/dashboard-moderator/manageproduct/product-list/product-arcive/{id_produk_detail}/visible',array(
    'as'=>'dashboard-moderator-manageproduct-visible',
    'uses'=>'ModeratorController@getProductListVisible'
));

Route::get('/dashboard-moderator/manageproduct/product-list/product-arcive/{id_produk_detail}/invisible',array(
    'as'=>'dashboard-moderator-manageproduct-invisible',
    'uses'=>'ModeratorController@getProductListInvisible'
));

Route::get('/dashboard-moderator/manageproduct/product-archive/{id_produk}', array(
    'as'=>'dashboard-moderator-manageproduct-product-archive',
    'uses'=>'ModeratorController@getProductArchive'
));

Route::get('/dashboard-moderator/manageproduct/product-archive/showdetail/{id_produk_detail}', array(
    'as'=>'dashboard-moderator-manageproduct-product-archive-showdetail',
    'uses'=>'ModeratorController@getProductArchiveShowDetail'
));

Route::get('/dashboard-moderator/product-status', array(
    'as'=>'dashboard-moderator-product-status',
    'uses'=>'ModeratorController@getModeratorProductStatus'
));

Route::get('/dashboard-moderator/manageproduct/need-approval', array(
    'as'=>'dashboard-moderator-need-approval',
    'uses'=>'ModeratorController@getModeratorNeedApproval'
));

Route::get('/dashboard-moderator/manageproduct/edit-product', array(
    'as'=>'dashboard-moderator-edit-product',
    'uses'=>'ModeratorController@getModeratorEditProduct'
));

Route::get('/dashboard-moderator/manageproduct/needapproval', array(
    'as'=>'dashboard-moderator-manageproduct-needapproval',
    'uses'=>'ModeratorController@getNeedApproval'
));

Route::get('/dashboard-moderator/manageproduct/needapproval/approve/{id_produk_detail}',array(
    'as'=>'dashboard-moderator-manageproduct-approve',
    'uses'=>'ModeratorController@postApproveProduct'
));

Route::get('/dashboard-moderator/manageproduct/needapproval/denied/{id_produk_detail}',array(
    'as'=>'dashboard-moderator-manageproduct-denied',
    'uses'=>'ModeratorController@postDeniedProduct'
));

Route::get('/dashboard-moderator/manageproduct/needapproval/details/{id_produk_detail}', array(
    'as'=>'dashboard-moderator-manageproduct-needapproval-details',
    'uses'=>'ModeratorController@getNeedApprovalDetails'
));
/*
 |--------------------------------------------------------------------------
 | Reversioning Product
 |--------------------------------------------------------------------------

*/
Route::get('/dashboard-moderator/manageproduct/reversioningapproval', array(
    'as'=>'dashboard-moderator-manageproduct-reversioning',
    'uses'=>'ModeratorController@getReversioningApproval'
));
Route::get('/dashboard-moderator/manageproduct/reversioningapproval/details/{id_reversioning}', array(
    'as'=>'dashboard-moderator-manageproduct-reversioning-details',
    'uses'=>'ModeratorController@getReversioningApprovalDetails'
));
Route::get('/dashboard-moderator/reversioning/file/download/{produk_link}',array(
    'as'	=>'moderator-reversioning-file',
    'uses'	=>'ModeratorController@getReversioningFileModerator'
));
Route::get('/moderator/manageproduct/reversioningdetails/{id_reversioning}/deny',array(
    'as'    =>'dashboard-moderator-manageproduct-reversioning-deny',
    'uses'  =>'ModeratorController@postDenyReversioning'
));
Route::get('/moderator/manageproduct/reversioningdetails/{id_reversioning}/approve',array(
    'as'    =>'dashboard-moderator-manageproduct-reversioning-approve',
    'uses'  =>'ModeratorController@postApproveReversioning'
));

