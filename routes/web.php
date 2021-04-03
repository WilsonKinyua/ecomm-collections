<?php

// Route::redirect('/', '/login');

Route::get('/', 'HomePage\HomePageController@index');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product Main Categories
    Route::delete('product-main-categories/destroy', 'ProductMainCategoryController@massDestroy')->name('product-main-categories.massDestroy');
    Route::resource('product-main-categories', 'ProductMainCategoryController');

    // Product Sub Categories
    Route::delete('product-sub-categories/destroy', 'ProductSubCategoryController@massDestroy')->name('product-sub-categories.massDestroy');
    Route::resource('product-sub-categories', 'ProductSubCategoryController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductsController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductsController');

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewsController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Slides
    Route::delete('slides/destroy', 'SlidesController@massDestroy')->name('slides.massDestroy');
    Route::post('slides/media', 'SlidesController@storeMedia')->name('slides.storeMedia');
    Route::post('slides/ckmedia', 'SlidesController@storeCKEditorImages')->name('slides.storeCKEditorImages');
    Route::resource('slides', 'SlidesController');

    // Sub Slide Ad Ones
    Route::delete('sub-slide-ad-ones/destroy', 'SubSlideAdOneController@massDestroy')->name('sub-slide-ad-ones.massDestroy');
    Route::post('sub-slide-ad-ones/media', 'SubSlideAdOneController@storeMedia')->name('sub-slide-ad-ones.storeMedia');
    Route::post('sub-slide-ad-ones/ckmedia', 'SubSlideAdOneController@storeCKEditorImages')->name('sub-slide-ad-ones.storeCKEditorImages');
    Route::resource('sub-slide-ad-ones', 'SubSlideAdOneController');

    // Sub Slide Ad Twos
    Route::delete('sub-slide-ad-twos/destroy', 'SubSlideAdTwoController@massDestroy')->name('sub-slide-ad-twos.massDestroy');
    Route::post('sub-slide-ad-twos/media', 'SubSlideAdTwoController@storeMedia')->name('sub-slide-ad-twos.storeMedia');
    Route::post('sub-slide-ad-twos/ckmedia', 'SubSlideAdTwoController@storeCKEditorImages')->name('sub-slide-ad-twos.storeCKEditorImages');
    Route::resource('sub-slide-ad-twos', 'SubSlideAdTwoController');

    // Site Settings
    Route::delete('site-settings/destroy', 'SiteSettingsController@massDestroy')->name('site-settings.massDestroy');
    Route::post('site-settings/media', 'SiteSettingsController@storeMedia')->name('site-settings.storeMedia');
    Route::post('site-settings/ckmedia', 'SiteSettingsController@storeCKEditorImages')->name('site-settings.storeCKEditorImages');
    Route::resource('site-settings', 'SiteSettingsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// filter products by category

Route::get('main/category/{id}','HomePage\HomePageController@show')->name('product.category');
Route::get('product/{id}','HomePage\HomePageController@productDetails')->name('product.details');
Route::get("category/{id}","HomePage\HomePageController@productCtaegory")->name('categ.product');
Route::get('cart',"HomePage\HomePageController@viewCart")->name("view.cart");
Route::get('cart/remove/{id}','HomePage\HomePageController@removeCart')->name('cart.remove');
Route::post("cart/add",'HomePage\HomePageController@addCart')->name('cart.product');
Route::get('confirmation','HomePage\HomePageController@confirmation')->name('order.confirmation');
Route::post('confirmation/place-order','HomePage\HomePageController@placeOrder')->name('place.order');
