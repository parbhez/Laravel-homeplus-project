<?php
Route::get('password',function(){
    return bcrypt(123);
});
Route::group(['middleware' => 'frontend'], function () {
//Start Frontend Section
    Route::get('/',
        ['as' => 'index',
            'uses' => 'HomeController@index'
        ]);

    Route::get('frontendLangChange/{langType}',
        ['as' => 'frontendLangChange',
            'uses' => 'HomeController@frontendLangChange'
        ]);

    Route::get('category/{categoryId}/{categoryName?}',
        ['as' => 'categoryWiseProduct',
            'uses' => 'HomeController@categoryWiseProduct'
        ]);

    Route::get('categoryWiseProductLoad',
        ['as' => 'categoryWiseProductLoad',
            'uses' => 'HomeController@categoryWiseProductLoad'
        ]);

    Route::get('sub-category/{subCategoryId}/{subCategoryName?}',
        ['as' => 'subCategoryWiseProduct',
            'uses' => 'HomeController@subCategoryWiseProduct'
        ]);

    Route::get('subCategoryWiseProductLoad',
        ['as' => 'subCategoryWiseProductLoad',
            'uses' => 'HomeController@subCategoryWiseProductLoad'
        ]);

    Route::get('sub-sub-category/{subSubCategoryId}/{subSubCategoryName?}',
        ['as' => 'subSubCategoryWiseProduct',
            'uses' => 'HomeController@subSubCategoryWiseProduct'
        ]);

    Route::get('subSubCategoryWiseProductLoad',
        ['as' => 'subSubCategoryWiseProductLoad',
            'uses' => 'HomeController@subSubCategoryWiseProductLoad'
        ]);

    Route::get('footerMenuDetails',
        ['as' => 'footerMenuDetails',
            'uses' => 'HomeController@footerMenuDetails'
        ]);

    Route::get('product-details/{productId}/{productName?}',
        ['as' => 'singleProductView',
            'uses' => 'HomeController@singleProductView'
        ]);

    Route::get('merchantCategoryWiseProduct/{merchantId}/{categoryId}/{categoryName?}',
        ['as' => 'merchantCategoryWiseProduct',
            'uses' => 'MerchantCornerController@categoryWiseProduct'
        ]);
    
    Route::get('merchantCategoryWiseProductLoad',
        ['as' => 'merchantCategoryWiseProductLoad',
            'uses' => 'MerchantCornerController@categoryWiseProductLoad'
        ]);

    Route::get('merchantSubCategoryWiseProduct/{merchantId}/{subCategoryId}/{subCategoryName?}',
        ['as' => 'merchantSubCategoryWiseProduct',
            'uses' => 'MerchantCornerController@subCategoryWiseProduct'
        ]);
    Route::get('merchantSubCategoryWiseProductLoad',
        ['as' => 'merchantSubCategoryWiseProductLoad',
            'uses' => 'MerchantCornerController@subCategoryWiseProductLoad'
        ]);

    Route::get('merchantSubSubCategoryWiseProduct/{merchantId}/{subSubCategoryId}/{subSubCategoryName?}',
        ['as' => 'merchantSubSubCategoryWiseProduct',
            'uses' => 'MerchantCornerController@subSubCategoryWiseProduct'
        ]);

    Route::get('merchantSubSubCategoryWiseProductLoad',
        ['as' => 'merchantSubSubCategoryWiseProductLoad',
            'uses' => 'MerchantCornerController@subSubCategoryWiseProductLoad'
        ]);
    //End Frontend Section


    //Start Frontend User Authentiction
    Route::get('frontendUser',
        ['as' => 'frontendUser',
            'uses' => 'FrontEndUserController@frontendUser'
        ]);

    Route::post('frontendUser',
        ['as' => 'frontendUserRegistration.post',
            'uses' => 'FrontEndUserController@saveFrontendUserRegistration'
        ]);

    Route::get('forgotePassword',
        ['as' => 'forgotePassword',
            'uses' => 'FrontEndUserController@forgotePassword'
        ]);
    Route::post('forgotePassword',
        ['as' => 'forgotePassword.post',
            'uses' => 'FrontEndUserController@sendNewPassword'
        ]);

    Route::get('userLogin',
        ['as' => 'userLogin',
            'uses' => 'FrontEndUserController@userLogin'
        ]);

    Route::post('checkUserLogin',
        ['as' => 'checkUserLogin.post',
            'uses' => 'FrontEndUserController@checkUserLogin'
        ]);
    //End Frontend User Authentiction


    //Start Merchant Section
    Route::get('merchantPage',
        ['as' => 'merchantPage',
            'uses' => 'MerchantCornerController@merchantPage'
        ]);

    Route::get('merchantForgotPassword',
        ['as' => 'merchantForgotPassword',
            'uses' => 'MerchantCornerController@merchantForgotPassword'
        ]);

    Route::post('merchantForgotPassword',
        ['as' => 'merchantForgotPassword.post',
            'uses' => 'MerchantCornerController@sendNewPassword'
        ]);

    Route::post('merchantPage',
        ['as' => 'merchantPage.post',
            'uses' => 'MerchantCornerController@saveMerchant'
        ]);

    Route::post('merchantLogin',
        ['as' => 'merchantLogin',
            'uses' => 'MerchantCornerController@checkMerchantLogin'
        ]);
    //Start Merchant Section


    //Start Shopping Cart Section
    Route::get('addToCart',
        ['as' => 'addToCart',
            'uses' => 'ShoppingCartController@addToCart'
        ]);

    Route::get('shoppingCartModal',
        ['as' => 'shoppingCartModal',
            'uses' => 'ShoppingCartController@shoppingCartModal'
        ]);

    Route::get('dropFromCart',
        ['as' => 'dropFromCart',
            'uses' => 'ShoppingCartController@dropFromCart'
        ]);

    Route::get('editQuantity',
        ['as' => 'editQuantity',
            'uses' => 'ShoppingCartController@editQuantity'
        ]);

    Route::get('getProductQuantity/{productId}',
        ['as' => 'getProductQuantity',
            'uses' => 'ShoppingCartController@getProductQuantity'
        ]);

    Route::get('checkout',
        ['as' => 'checkout',
            'uses' => 'ShoppingCartController@checkout'
        ]);

    //Product Section
    Route::get('merchantAllProducts/{merchantId}',
        ['as' => 'merchantAllProducts',
            'uses' => 'MerchantCornerController@merchantAllProduct'
        ]);

    Route::post('serachProduct',
        ['as' => 'serachProduct',
            'uses' => 'HomeController@serachProduct'
        ]);

});


Route::group(['middleware' => 'frontendUserAuth'], function () {

    Route::get('userDashboard',
        ['as' => 'userDashboard',
            'uses' => 'FrontEndUserController@userDashboard'
        ]);

    Route::get('manageUserProfile',
        ['as' => 'manageUserProfile',
            'uses' => 'FrontEndUserController@manageUserProfile'
        ]);

    Route::POST('updateUserProfile',
        [   'as' => 'updateUserProfile',
            'uses' => 'FrontEndUserController@updateUserProfile'
        ]);

    Route::get('checkUserPassword',
        [   'as' => 'checkUserPassword',
            'uses' => 'FrontEndUserController@checkUserPassword'
        ]);

    Route::post('saveUserPassword',
        [   'as' => 'saveUserPassword.post',
            'uses' => 'FrontEndUserController@saveUserPassword'
        ]);

    Route::get('getMarcentWiseCityCost/{cityId}',
        [   'as' => 'getMarcentWiseCityCost',
            'uses' => 'ShoppingCartController@getMarcentWiseCityCost'
        ]);

    Route::post('saveShoppingCartItem',
        [   'as' => 'saveShoppingCartItem',
            'uses' => 'ShoppingCartController@saveShoppingCartItem'
        ]);

    Route::get('userLogout',
        ['as' => 'userLogout',
            'uses' => 'FrontEndUserController@userLogout'
        ]);
});


Route::group(['middleware' => 'merchantAuth'], function () {

    Route::get('merchantLogout',
        ['as' => 'merchantLogout',
            'uses' => 'MerchantCornerController@merchantLogout'
        ]);

    Route::get('merchantDashboard',
        ['as' => 'merchantDashboard',
            'uses' => 'MerchantCornerController@merchantDashboard'
        ]);

    Route::get('orderProductDetailsModal/{orderDetailsId}/action',
        ['as' => 'orderProductDetailsModal',
            'uses' => 'MerchantCornerController@orderProductDetailsModal'
        ]);

    Route::get('merchantSaleAndCancleProduct/{serach_priode}/{serach_content?}',
        ['as' => 'merchantSaleAndCancleProduct',
            'uses' => 'MerchantCornerController@getMerchantSaleAndCancleProduct'
        ]);

    Route::get('merchantManagement',
        ['as' => 'merchantManagement',
            'uses' => 'MerchantCornerController@merchantManagement'
        ]);

    Route::get('merchantStockStatus/{productId}/{stockstatus}',
        ['as' => 'merchantStockStatus',
            'uses' => 'MerchantCornerController@merchantStockStatus'
        ]);

    Route::get('merchantOrder',
        ['as' => 'merchantOrder',
            'uses' => 'MerchantCornerController@merchantOrder'
        ]);

    Route::get('merchantApproveOrder/{id}',
        ['as' => 'merchantApproveOrder',
            'uses' => 'MerchantCornerController@merchantApproveOrders'
        ]);

    Route::get('merchantShiftmentOrder/{id}',
        ['as' => 'merchantShiftmentOrder',
            'uses' => 'MerchantCornerController@merchantShiftmentOrder'
        ]);

    Route::get('merchantOrderDenyModal/{orderId}/deny',
        [   'as' => 'merchantOrderDenyModal',
            'uses' => 'MerchantCornerController@merchantDenyOrdersModal'
        ]);

    Route::post('orderDenyConfirm',
        [   'as' => 'orderDenyConfirm.post',
            'uses' => 'MerchantCornerController@merchantDenyOrdersConfirm'
        ]);

    Route::get('orderDetailsModal/{productId}/view',
        [   'as' => 'orderDetailsModal',
            'uses' => 'MerchantCornerController@orderDetailsView'
        ]);

    Route::get('merchantProduct',
        ['as' => 'merchantProduct',
            'uses' => 'MerchantCornerController@merchantProduct'
        ]);

    Route::get('merchantNextProductAdd',
        ['as' => 'merchantNextProductAdd',
            'uses' => 'MerchantCornerController@merchantNextProductAdd'
        ]);

    Route::get('getCategoryWiseSubCategory/{categoryId}',
        ['as' => 'getCategoryWiseSubCategory',
            'uses' => 'MerchantCornerController@getCategoryWiseSubCategory'
        ]);

    Route::get('getSubCategoryWiseSubCategoryDetailsSelect/{subCategoryId}',
        ['as' => 'getSubCategoryWiseSubCategoryDetailsSelect',
            'uses' => 'MerchantCornerController@getSubCategoryWiseSubCategoryDetails'
        ]);

    Route::post('merchantProduct',
        ['as' => 'merchantProduct.post',
            'uses' => 'MerchantCornerController@saveMerchantProduct'
        ]);

    /*Route::get('updateProductCode',
        ['as' => 'updateProductCode',
            'uses' => 'MerchantCornerController@updateProductCode'
        ]);*/

    Route::post('merchantManagement',
        ['as' => 'merchantManagement.post',
            'uses' => 'MerchantCornerController@merchantProductSearch'
        ]);

    Route::get('merchantProductEdit/{productId}/{slug}',
        ['as' => 'merchantProductEdit',
            'uses' => 'MerchantCornerController@merchantProductEdit'
        ]);

    Route::post('merchantProductEdit',
        ['as' => 'merchantProductEdit.post',
            'uses' => 'MerchantCornerController@saveMerchantProductEdit'
        ]);

    Route::get('mercentRemoveProductImage',
        ['as' => 'mercentRemoveProductImage',
            'uses' => 'MerchantCornerController@mercentRemoveProductImage'
        ]);

    Route::get('merchantReport',
        ['as' => 'merchantReport',
            'uses' => 'MerchantCornerController@merchantReport'
        ]);

    Route::get('manageProfile',
        ['as' => 'manageProfile',
            'uses' => 'MerchantCornerController@manageProfile'
        ]);
    

    Route::post('updateAccountInformation',
        ['as' => 'updateAccountInformation.post',
            'uses' => 'MerchantCornerController@updateAccountInformation'
        ]);

    Route::get('checkMerchantPassword',
        ['as' => 'checkMerchantPassword',
            'uses' => 'MerchantCornerController@checkMerchantPassword'
        ]);

    Route::get('updateEmailAndPass',
        ['as' => 'updateEmailAndPass',
            'uses' => 'MerchantCornerController@updateEmailAndPass'
        ]);

    Route::post('manageProfile',
        ['as' => 'editMerchantImage.post',
            'uses' => 'MerchantCornerController@saveEditMerchantImage'
        ]);
    
});


Route::get('test',function(){
    return encrypt(123);
});