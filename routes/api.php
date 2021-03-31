<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Main Categories
    Route::apiResource('product-main-categories', 'ProductMainCategoryApiController');

    // Product Sub Categories
    Route::apiResource('product-sub-categories', 'ProductSubCategoryApiController');

    // Products
    Route::post('products/media', 'ProductsApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductsApiController');

    // Reviews
    Route::apiResource('reviews', 'ReviewsApiController', ['except' => ['store', 'update']]);

    // Orders
    Route::apiResource('orders', 'OrdersApiController', ['except' => ['store', 'update']]);

    // Slides
    Route::post('slides/media', 'SlidesApiController@storeMedia')->name('slides.storeMedia');
    Route::apiResource('slides', 'SlidesApiController');

    // Sub Slide Ad Ones
    Route::post('sub-slide-ad-ones/media', 'SubSlideAdOneApiController@storeMedia')->name('sub-slide-ad-ones.storeMedia');
    Route::apiResource('sub-slide-ad-ones', 'SubSlideAdOneApiController');

    // Sub Slide Ad Twos
    Route::post('sub-slide-ad-twos/media', 'SubSlideAdTwoApiController@storeMedia')->name('sub-slide-ad-twos.storeMedia');
    Route::apiResource('sub-slide-ad-twos', 'SubSlideAdTwoApiController');

    // Site Settings
    Route::post('site-settings/media', 'SiteSettingsApiController@storeMedia')->name('site-settings.storeMedia');
    Route::apiResource('site-settings', 'SiteSettingsApiController');
});
