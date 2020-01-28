<?php

//User Paths
Route::get('/', 'Frontend\producthousebdController@index')->name('index');

//Category
Route::get('/category/{id}', 'Frontend\producthousebdController@category')->name('category');

//Sub-Category
Route::get('/subcategory/{id}', 'Frontend\producthousebdController@subcategory')->name('subcategory');

//Search
Route::get('/search', 'Frontend\SearchController@search')->name('search');
//Single Product
Route::get('/product/details/{id}', 'Frontend\producthousebdController@productDetails')->name('product.details');

//user Auth
Auth::routes();

Route::get('/dynamic_pdf', 'Frontend\DynamicPDFController@index')
    ->name('dynamic.pdf');
Route::get('/dynamic_pdf/pdf', 'Frontend\DynamicPDFController@pdf')->name('dynamic.pdf.generate');

Route::group(['prefix' => '/user'], function () {
    Route::get('/profile/{id}', 'Frontend\UserController@show')
        ->name('user.profile');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/product/OrderForm/{id}', 'Frontend\producthousebdController@orderForm')->name('product.orderform');

    Route::post('/product/Order/confirm/{id}', 'Frontend\producthousebdController@confirmOrder')->name('product.order.confirm');
});

/*Admin Routes*/

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'Backend\AdminController@homeadmin')->name('homeadmin');

    //------------- Categories

    Route::get('/addCategory', 'Backend\ProductController@showCategoryForm')->name('admin.addCategory');
    Route::post('/addCategory', 'Backend\ProductController@categoryStore')->name('admin.addCategory.store');
    Route::get('/viewCategory', 'Backend\ProductController@categoryShow')->name('admin.viewCategories');
    Route::get('/editCategory/{id}', 'Backend\ProductController@editcategory')->name('admin.editcategory');
    Route::post('/updateCategory/{id}', 'Backend\ProductController@updatecategory')->name('admin.editCategory.update');
    Route::get('/deleteCategory/{id}', 'Backend\ProductController@deleteCategory')->name('admin.deleteCategory');

    //-------------Sub Categories

    Route::get('/addSubCategory', 'Backend\SubcategoryController@create')->name('admin.addSubCategory');
    Route::post('/addSubCategory', 'Backend\SubcategoryController@store')->name('admin.addSubCategory.store');
    Route::get('/viewSubCategory', 'Backend\SubcategoryController@index')->name('admin.viewSubCategories');
    Route::get('/editSubCategory/{id}', 'Backend\SubcategoryController@edit')->name('admin.editSubCategory');
    Route::post('/updateSubCategory/{id}', 'Backend\SubcategoryController@update')->name('admin.editSubCategory.update');
    Route::get('/deleteSubCategory/{id}', 'Backend\SubcategoryController@delete')->name('admin.deleteSubCategory');

    /*  ------------ Products ------------- */
    Route::get('/addProduct', 'Backend\ProductController@showProductForm')->name('admin.addProduct');
    Route::post('/addProduct', 'Backend\ProductController@productStore')->name('admin.addProduct.store');
    Route::get('/viewProducts', 'Backend\ProductController@productShow')->name('admin.viewProducts');
    Route::get('/viewOrders', 'Backend\OrderController@orderShow')->name('admin.viewOrders');
    Route::get('/editProduct/{id}', 'Backend\ProductController@editProduct')->name('admin.editproduct');
    Route::post('/updateProduct/{id}', 'Backend\ProductController@updateProduct')->name('admin.editproduct.update');
    Route::get('/deleteProduct/{id}', 'Backend\ProductController@deleteProduct')->name('admin.deleteProduct');
    Route::get('/deleteProductImage/{id}', 'Backend\ProductController@deleteProductImage')->name('admin.product.deleteimage');

    //Api daynamic Sub-Category
    Route::get('/get-subcategories/{id}', function ($id) {
        return json_encode(App\Models\Subcategory::where('category_id', $id)->get());
    });

    /**----------------Admins -------------------- */
    Route::get('/admins', 'Backend\AdminController@admins')->name('admin.admins');
    Route::get('/addAdmin', 'Backend\AdminController@showAdminForm')->name('admin.addAdmin');
    Route::post('/addAdmin', 'Backend\AdminController@createAdmin')->name('admin.addAdmin.create');
    Route::get('/users', 'Backend\AdminController@users')->name('admin.users');
    Route::get('/profile', 'Backend\AdminController@profile')->name('admin.profile');
    Route::get('/editProfile', 'Backend\AdminController@editProfile')->name('admin.editProfile');
    Route::post('/updateProfile', 'Backend\AdminController@updateProfile')->name('admin.profileUpdate');
    Route::get('/settings', 'Backend\AdminController@settings')->name('admin.settings');
    Route::post('/updatesettings', 'Backend\AdminController@updatePassword')->name('admin.updatePassword');

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

    // Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')
    //     ->name('admin.password.request');
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')
        ->name('admin.password.reset');

});

//Order Routes
Route::group(['prefix' => '/orders'], function () {
    Route::get('/', 'Backend\OrderController@index')->name('admin.orders');
    Route::get('/show/{id}', 'Backend\OrderController@show')->name('admin.order.show');
    Route::get('/delete/{id}', 'Backend\OrderController@delete')->name('admin.order.delete2');
    Route::post('/delete/{id}', 'Backend\OrderController@delete')->name('admin.order.delete');
    Route::post('/completed/{id}', 'Backend\OrderController@completed')->name('admin.order.completed');
    Route::post('/paid/{id}', 'Backend\OrderController@paid')->name('admin.order.paid');
});

//Cart Routes

Route::group(['prefix' => '/carts'], function () {
    Route::get('/', 'Frontend\CartController@index')->name('carts');
    Route::post('/store', 'Frontend\CartController@store')->name('carts.store');
    Route::post('/update/{id}', 'Frontend\CartController@update')->name('carts.update');
    Route::post('/delete/{id}', 'Frontend\CartController@destroy')->name('carts.delete');
});

//Checkout Routes
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'Frontend\CheckoutController@index')->name('checkout');
    Route::post('/store', 'Frontend\CheckoutController@store')->name('checkout.store');
});

//Dynamic Sliders Routes

Route::group(['prefix' => '/sliders'], function () {
    Route::get('/', 'Backend\SliderController@index')->name('admin.sliders');
    Route::post('/store', 'Backend\SliderController@store')->name('slider.store');
});