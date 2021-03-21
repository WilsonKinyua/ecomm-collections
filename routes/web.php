<?php

// Route::redirect('/', '/login');

Route::get("/","HomePageController@index");

// Display product details
Route::get("/product/{id}/product-details","HomePageController@productDetails")->name("product.details");

// Filter products by category id
Route::get("/product-list/category/{id}","HomePageController@productCategory")->name("product.category");

// view for Register or login user
Route::get("account","HomePageController@authUserLogin")->name("auth.account");

Route::get("account/register","HomePageController@authUserRegister")->name("auth.register.user");
Route::post("account/create/","HomePageController@register")->name("auth.register");

// create account
// Route::get("account/register","HomePageController@registerUser")->name("auth.register");

// all products
Route::get("/products", "HomePageController@allProducts")->name("products.products");

// all categories
Route::get("/categories","HomePageController@allCategories")->name("categories.categories");

// search
Route::any('/search', "HomePageController@search")->name('search.search');

Route::get("cart","HomePageController@cart")->name("cart.cart");
Route::get("cart/add/{id}","HomePageController@addCart")->name("cart.add");
Route::post("cart/update","HomePageController@updateCart")->name("cart.update");

Route::get("checkout","HomePageController@checkout")->name("account.checkout");

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

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

    // Product Categories
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tags
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Products
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Orders
    Route::resource('orders', 'OrdersController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Homepages
    Route::delete('homepages/destroy', 'HomepageController@massDestroy')->name('homepages.massDestroy');
    Route::post('homepages/media', 'HomepageController@storeMedia')->name('homepages.storeMedia');
    Route::post('homepages/ckmedia', 'HomepageController@storeCKEditorImages')->name('homepages.storeCKEditorImages');
    Route::resource('homepages', 'HomepageController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');

    // Subscribedusers
    Route::delete('subscribedusers/destroy', 'SubscribedusersController@massDestroy')->name('subscribedusers.massDestroy');
    Route::resource('subscribedusers', 'SubscribedusersController');
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
