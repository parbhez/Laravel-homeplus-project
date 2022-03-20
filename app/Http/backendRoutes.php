<?php

Route::get('login',
	[   'as' => 'login',
		'uses' => 'LoginController@login'
	]);

Route::post('login',
	[   'as' => 'login.post',
		'uses' => 'LoginController@checkLogin'
	]);

Route::get('logout',
	[   'as' => 'logout',
		'uses' => 'LoginController@logout'
	]);

//===== Star category Section=====

Route::group(['middleware' => 'adminAuth'], function () {
	Route::get('adminTOMerchantLogin/{merchantId}',
		[   'as' => 'adminTOMerchantLogin',
			'uses' => 'DashboardController@adminTOMerchantLogin'
		]);
	
	Route::get('dashboard',
	    [   'as' => 'dashboard',
	        'uses' => 'DashboardController@dashboard'
	    ]);

	Route::get('langChange/{langType}',
	    [   'as' => 'langChange',
	        'uses' => 'DashboardController@langChange'
	    ]);

	Route::get('category',
	    [   'as' => 'category',
	        'uses' => 'BasicSetupController@category'
	    ]);

	Route::post('category',
	    [   'as' => 'category.post',
	        'uses' => 'BasicSetupController@saveCategory'
	    ]);

	Route::get('categoryEditModal/{categoryId}/action',
	    [   'as' => 'categoryEditModal',
	        'uses' => 'BasicSetupController@categoryEditModal'
	    ]);

	Route::post('saveEditCategory',
	    [   'as' => 'saveEditCategory.post',
	        'uses' => 'BasicSetupController@saveEditCategory'
	    ]);

	Route::get('inactiveCategory/{id}',
	    [   'as' => 'inactiveCategory',
	        'uses' => 'BasicSetupController@inactiveCategory'
	    ]);

	Route::get('activeCategory/{id}',
	    [   'as' => 'activeCategory',
	        'uses' => 'BasicSetupController@activeCategory'
	    ]);
//===== End category Section=====

//===== Start Sub category Section=====
	Route::get('subCategory',
	    [   'as' => 'subCategory',
	        'uses' => 'BasicSetupController@subCategory'
	    ]);

	Route::post('subCategory',
	    [   'as' => 'subCategory.post',
	        'uses' => 'BasicSetupController@saveSubCategory'
	    ]);

	Route::get('subCategoryEditModal/{subCategoryId}/action',
	    [   'as' => 'subCategoryEditModal',
	        'uses' => 'BasicSetupController@subCategoryEditModal'
	    ]);

	Route::post('saveEditSubCategory',
	    [   'as' => 'saveEditSubCategory.post',
	        'uses' => 'BasicSetupController@saveEditSubCategory'
	    ]);

	Route::get('inactiveSubCategory/{id}',
	    [   'as' => 'inactiveSubCategory',
	        'uses' => 'BasicSetupController@inactiveSubCategory'
	    ]);

	Route::get('activeSubCategory/{id}',
	    [   'as' => 'activeSubCategory',
	        'uses' => 'BasicSetupController@activeSubCategory'
	    ]);

//===== End Sub category Section=====


//===== Start Sub Category Details Section=====

	Route::get('subCategoryDetails',
	    [   'as' => 'subCategoryDetails',
		'uses' => 'BasicSetupController@subCategoryDetails'
	    ]);

	Route::get('categoryId/{categoryId}',
	    [   'as' => 'categoryId',
			'uses' => 'BasicSetupController@getCategoryWiseSubCategory'
	    ]);



	Route::post('subCategoryDetails',
	    [   'as' => 'subCategoryDetails.post',
	        'uses' => 'BasicSetupController@subCategoryDetailsSave'
	    
	    ]);

	Route::get('saveEditSubCategoryDetails',
	    [   'as' => 'saveEditSubCategoryDetails',
	        'uses' => 'BasicSetupController@saveEditSubCategoryDetails'
	    ]);

	Route::get('inactiveSubCategoryDetails/{id}',
	    [   'as' => 'inactiveSubCategoryDetails',
	        'uses' => 'BasicSetupController@inactiveSubCategoryDetails'
	    ]);

	Route::get('activeSubCategoryDetails/{id}',
	    [   'as' => 'activeSubCategoryDetails',
	        'uses' => 'BasicSetupController@activeSubCategoryDetails'
	    ]);
	
//===== End Sub Category Details Section=====

//===== Start Color Section=====
	Route::get('color',
	    [   'as' => 'color',
	        'uses' => 'BasicSetupController@color'
	    ]);

	Route::post('color',
	    [   'as' => 'color.post',
	        'uses' => 'BasicSetupController@saveColor'
	    ]);

	Route::get('saveEditColor',
	    [   'as' => 'saveEditColor',
	        'uses' => 'BasicSetupController@saveEditColor'
	    ]);

	Route::get('inactiveColor/{id}',
	    [   'as' => 'inactiveColor',
	        'uses' => 'BasicSetupController@inactiveColor'
	    ]);

	Route::get('activeColor/{id}',
	    [   'as' => 'activeColor',
	        'uses' => 'BasicSetupController@activeColor'
	    ]);

//===== End Color Section=====

//===== Start Size Section=====
	Route::get('size',
	    [   'as' => 'size',
	        'uses' => 'BasicSetupController@size'
	    ]);

	Route::post('size',
	    [   'as' => 'size.post',
	        'uses' => 'BasicSetupController@saveSize'
	    ]);

	Route::get('saveEditSize',
	    [   'as' => 'saveEditSize',
	        'uses' => 'BasicSetupController@saveEditSize'
	    ]);

	Route::get('inactiveSize/{id}',
	    [   'as' => 'inactiveSize',
	        'uses' => 'BasicSetupController@inactiveSize'
	    ]);

	Route::get('activeSize/{id}',
	    [   'as' => 'activeSize',
	        'uses' => 'BasicSetupController@activeSize'
	    ]);

//===== End Size Section=====

//===== Start City Section=====
	Route::get('city',
	    [   'as' => 'city',
	        'uses' => 'BasicSetupController@city'
	    ]);

	Route::post('city',
	    [   'as' => 'city.post',
	        'uses' => 'BasicSetupController@saveCity'
	    ]);

	Route::get('saveEditCity',
	    [   'as' => 'saveEditCity',
	        'uses' => 'BasicSetupController@saveEditCity'
	    ]);

	Route::get('inactiveCity/{id}',
	    [   'as' => 'inactiveCity',
	        'uses' => 'BasicSetupController@inactiveCity'
	    ]);

	Route::get('activeCity/{id}',
	    [   'as' => 'activeCity',
	        'uses' => 'BasicSetupController@activeCity'
	    ]);

//===== End City Section=====
//================ @@ Start Photo Slider Section @@ ====================
	Route::get('photoSlider',
		[   'as' => 'photoSlider',
			'uses' => 'PhotoSliderController@photoSlider'
		]);

	Route::post('photoSlider',
		[   'as' => 'photoSlider.post',
			'uses' => 'PhotoSliderController@savePhotoSlider'
		]);

	Route::get('photoSlider/{sliderId}/edit',
		[   'as' => 'photoSliderEdit',
			'uses' => 'PhotoSliderController@editPhotoSlider'
		]);

	Route::post('saveEditPhotoSlider',
		[   'as' => 'saveEditPhotoSlider.post',
			'uses' => 'PhotoSliderController@saveEditPhotoSlider'
		]);

	Route::get('activePhotoSlider/{id}',
		[   'as' => 'activePhotoSlider',
			'uses' => 'PhotoSliderController@activePhotoSlider'
		]);

	Route::get('inactivePhotoSlider/{id}',
		[   'as' => 'inactivePhotoSlider',
			'uses' => 'PhotoSliderController@inactivePhotoSlider'
		]);

//================ @@ End Photo Slider Section @@ ====================

//====== start Marchent Section ========
	Route::get('merchant',
	    [   'as' => 'merchant',
	        'uses' => 'MerchantController@merchant'
	    ]);

	Route::get('merchantAdminEdit/{merchantId}',
		[   'as' => 'merchantAdminEdit',
			'uses' => 'MerchantController@merchantAdminEdit'
		]);

	Route::post('saveMerchantAdminEdit',
		[   'as' => 'saveMerchantAdminEdit',
			'uses' => 'MerchantController@saveMerchantAdminEdit'
		]);

	Route::get('merchantAdminPasswordChange',
		[   'as' => 'merchantAdminPasswordChange',
			'uses' => 'MerchantController@merchantAdminPasswordChange'
		]);

	Route::get('merchantWiseProduct/{id}',
	    [   'as' => 'merchantWiseProduct',
	        'uses' => 'MerchantController@merchantProducts'
	    ]);

	Route::get('approvedMerchant/{id}',
	    [   'as' => 'approvedMerchant',
	        'uses' => 'MerchantController@approvedMerchant'
	    ]);

	Route::get('inactiveMerchant/{id}',
	    [   'as' => 'inactiveMerchant',
	        'uses' => 'MerchantController@inactiveMerchant'
	    ]);

	Route::get('activeMerchant/{id}',
	    [   'as' => 'activeMerchant',
	        'uses' => 'MerchantController@activeMerchant'
	    ]);
//=========end Marchent=========

//===== Start Product Section=====
	Route::get('product',
	    [   'as' => 'product',
	        'uses' => 'ProductController@product'
	    ]);
	Route::get('merchantProductsView/{id}',
	    [   'as' => 'merchantProductsView',
	        'uses' => 'ProductController@merchantProductsView'
	    ]);

	Route::get('singleProductDetailsModal/{productId}/view',
	    [   'as' => 'singleProductDetailsModal',
	        'uses' => 'ProductController@singelProductView'
	    ]);

	Route::get('getSubCategoryWiseSubCategoryDetails/{subCategoryId}',
	    [   'as' => 'getSubCategoryWiseSubCategoryDetails',
	        'uses' => 'ProductController@getSubCategoryWiseSubCategoryDetails'
	    ]);

	Route::get('productEditView/{productId}',
	    [   'as' => 'productEditView',
	        'uses' => 'ProductController@productEditView'
	    ]);

	Route::post('product',
	    [   'as' => 'product.post',
	        'uses' => 'ProductController@saveProduct'
	    ]);

	Route::post('editProductDetails',
	    [   'as' => 'editProductDetails.post',
	        'uses' => 'ProductController@saveEditProductDetails'
	    ]);

	Route::post('editProductProperties',
	    [   'as' => 'editProductProperties.post',
	        'uses' => 'ProductController@saveEditProductProperties'
	    ]);

	Route::post('editProductImage',
	    [   'as' => 'editProductImage.post',
	        'uses' => 'ProductController@saveEditProductImage'
	    ]);

	Route::get('removeImage',
		[	'as'=>'removeImage',
		 	'uses'=>'ProductController@removeImage'
		]);

	Route::get('inactiveProduct/{id}',
	    [   'as' => 'inactiveProduct',
	        'uses' => 'ProductController@inactiveProduct'
	    ]);
	Route::get('denyProduct/{id}',
	    [   'as' => 'denyProduct',
	        'uses' => 'ProductController@denyProduct'
	    ]);

	Route::get('activeProduct/{id}',
	    [   'as' => 'activeProduct',
	        'uses' => 'ProductController@activeProduct'
	    ]);
//===== End Product Section=====

//====== start User Section =====
	Route::get('user',
	    [   'as' => 'user',
	        'uses' => 'UserController@user'
	    ]);

	Route::post('user',
	    [   'as' => 'user.post',
	        'uses' => 'UserController@saveUser'
	    ]);

	Route::get('saveEditUser',
	    [   'as' => 'saveEditUser',
	        'uses' => 'UserController@saveEditUser'
	    ]);

	Route::get('inactiveUser/{id}',
	    [   'as' => 'inactiveUser',
	        'uses' => 'UserController@inactiveUser'
	    ]);

	Route::get('activeUser/{id}',
	    [   'as' => 'activeUser',
	        'uses' => 'UserController@activeUser'
	    ]);

//============== Admin Section =============
	Route::get('admin',
		    [   'as' => 'admin',
		        'uses' => 'UserController@admin'
		    ]);

	Route::post('admin',
		    [   'as' => 'admin.post',
		        'uses' => 'UserController@saveAdmin'
		    ]);

	Route::get('saveEditAdmin',
	    [   'as' => 'saveEditAdmin',
	        'uses' => 'UserController@saveEditAdmin'
	    ]);

	Route::get('activeAdmin/{adminId}',
	    [   'as' => 'activeAdmin',
	        'uses' => 'UserController@activeAdmin'
	    ]);

	Route::get('inactiveAdmin/{adminId}',
	    [   'as' => 'inactiveAdmin',
	        'uses' => 'UserController@inactiveAdmin'
	    ]);
//======= End User Section ========


//====== Start Orders Section ========
	Route::get('orders',
		    [   'as' => 'orders',
		        'uses' => 'OrderController@viewAllOrder'
		    ]);


	Route::get('loadOrderDetailsModal/{id}/view',
	    [   'as'    => 'loadOrderDetailsModal',
	        'uses'  => 'OrderController@loadOrderDetailsModal'
	    ]);

	Route::get('approveOrder/{orderId}',
	    [   'as'    => 'approveOrder',
	        'uses'  => 'OrderController@approveOrder'
	    ]);
	Route::get('saleConfirm/{orderId}',
		[   'as'    => 'saleConfirm',
			'uses'  => 'OrderController@saleConfirm'
		]);

	Route::get('denyOrder/{orderId}',
	    [   'as'    => 'denyOrder',
	        'uses'  => 'OrderController@denyOrder'
	    ]);

	Route::get('saveEditOrdersInfo',
		    [   'as' => 'saveEditOrdersInfo',
		        'uses' => 'OrderController@saveEditOrdersInfo'
		    ]);

	Route::get('updateShippingCost',
		    [   'as' => 'updateShippingCost',
		        'uses' => 'OrderController@updateShippingCost'
		    ]);
	Route::get('deleteOrderDetails',
		    [   'as' => 'deleteOrderDetails',
		        'uses' => 'OrderController@deleteOrderDetails'
		    ]);
//====== End Orders Section ========

//==== Start Dashboard Section =====
	Route::get('profile',
	    [   'as' => 'profile',
	        'uses' => 'DashboardController@profile'
	    ]);
	
	Route::post('profile',
	    [   'as' => 'profile.post',
	        'uses' => 'DashboardController@saveProfile'
	    ]);

	Route::get('systemSetting',
		    [   'as' => 'systemSetting',
		        'uses' => 'DashboardController@systemSetting'
		    ]);
	Route::post('systemSetting',
		    [   'as' => 'systemSetting.post',
		        'uses' => 'DashboardController@saveSystemSetting'
		    ]);

	Route::get('checkAdminPassword',
		    [   'as' => 'checkAdminPassword',
		        'uses' => 'DashboardController@checkAdminPassword'
		    ]);

	Route::post('saveAdminPassword',
		    [   'as' => 'saveAdminPassword.post',
		        'uses' => 'DashboardController@saveAdminPassword'
		    ]);
//======End Dashboard Section ========

    //======report section============
    Route::get('report',
        [   'as'    =>  'report',
            'uses'  =>  'ReportController@report'
        ]);
    Route::get('merchantWiseIncome',
        [   'as'    =>  'merchantWiseIncome',
            'uses'  =>  'ReportController@getmerchent'
        ]);
    Route::get('merchantWiseIncomeReport/{merchentId}',
        [   'as'    =>  'merchantWiseIncomeReport',
            'uses'  =>  'ReportController@merchantWiseIncomeLoad'
        ]);

    //=========end report section=========

});
