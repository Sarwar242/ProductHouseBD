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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin routes

Route::match(['get','post'],'/admin','AdminController@login')->name('admin');

//Route::match(['get','post'],'/admin/reset','AdminController@reset')->name('reset');

Route::group(['middleware'=>['auth']], function()
{
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dash_name');
    Route::get('/admin/settings', 'AdminController@settings')->name('set_name');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword')->name('chk_pwd');

    Route::match(['get','post'],'/admin/update-pwd','AdminController@updtPassword')->name('updt_pwd');
    
});

Route::get('/logout', 'AdminController@logout')->name('logout');



