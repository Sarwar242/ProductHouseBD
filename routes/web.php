<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'Frontend\producthousebdController@index')->name('index');
Route::get('/product/details/{id}', 'Frontend\producthousebdController@productDetails')->name('product.details');
Route::get('/product/OrderForm/{id}', 'Frontend\producthousebdController@orderForm')->name('product.orderform');
Route::get('/product/Order/confirm/{id}', 'Frontend\producthousebdController@confirmOrder')->name('product.order.confirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin routes

Route::match(['get', 'post'], '/admin', 'AdminController@login')->name('admin');

Route::match(['get', 'post'], '/admin/reset', 'AdminController@reset')->name('reset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dash_name');
    Route::get('/admin/settings', 'AdminController@settings')->name('set_name');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword')->name('chk_pwd');

    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updtPassword')->name('updt_pwd');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updtPassword')->name('updt_pwd');

    //categories routes
    Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategories');
    Route::get('/logout', 'AdminController@logout')->name('logout');

});