<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

//User Paths
Route::get('/', 'Frontend\producthousebdController@index')->name('index');
Route::get('/product/details/{id}', 'Frontend\producthousebdController@productDetails')->name('product.details');
Route::get('/product/OrderForm/{id}', 'Frontend\producthousebdController@orderForm')->name('product.orderform');
Route::get('/product/Order/confirm/{id}', 'Frontend\producthousebdController@confirmOrder')->name('product.order.confirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

});

/*Admin Routes*/

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'Backend\AdminController@homeadmin')->name('homeadmin');
    Route::get('/addCategory', 'Backend\ProductController@showCategoryForm')->name('admin.addCategory');
    Route::post('/addCategory', 'Backend\ProductController@categoryStore')->name('admin.addCategory.store');
    Route::get('/viewCategory', 'Backend\ProductController@categoryShow')->name('admin.viewCategories');
    Route::get('/addProduct', 'Backend\ProductController@showProductForm')->name('admin.addProduct');
    Route::post('/addProduct', 'Backend\ProductController@productStore')->name('admin.addProduct.store');
    Route::get('/viewProducts', 'Backend\ProductController@productShow')->name('admin.viewProducts');
    Route::get('/viewOrders', 'Backend\OrderController@orderShow')->name('admin.viewOrders');

    Route::get('/admins', 'Backend\AdminsController@admins')->name('admin.admins');
    Route::get('/users', 'Backend\AdminsController@users')->name('admin.users');
    // Route::get('/inactivemembers', 'Backend\AdminsController@inactivemembers')->name('inactivemembers');
    // Route::get('/review', 'Backend\AdminsController@review')->name('review');
    // Route::get('/reviewed', 'Backend\AdminsController@reviewed')->name('reviewed');

    // Admin Login
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')
        ->name('admin.login');
    Route::post('/login/submit', 'Auth\Admin\LoginController@login')
        ->name('admin.login.submit');
    // Admin Logout

    Route::post('/logout', 'Auth\Admin\LoginController@logout')
        ->name('admin.logout');

    //Admin Password Reset

    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')
        ->name('admin.password.email');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')
        ->name('admin.password.update');

    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')
        ->name('admin.password.request');
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')
        ->name('admin.password.reset');

});
