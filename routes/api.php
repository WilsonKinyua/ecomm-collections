<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Sliders
    Route::post('sliders/media', 'SlidersApiController@storeMedia')->name('sliders.storeMedia');
    Route::apiResource('sliders', 'SlidersApiController');

    // Orders
    Route::apiResource('orders', 'OrdersApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Homepages
    Route::post('homepages/media', 'HomepageApiController@storeMedia')->name('homepages.storeMedia');
    Route::apiResource('homepages', 'HomepageApiController');

    // Comments
    Route::apiResource('comments', 'CommentsApiController');

    // Subscribedusers
    Route::apiResource('subscribedusers', 'SubscribedusersApiController');
});
