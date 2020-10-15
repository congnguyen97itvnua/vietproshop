<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// FrontEnd

Route::group(['prefix' => '/', 'namespace'=>'Frontend'], function () {
    Route::get('/', 'FrontendController@index')->name('frontend.index');
    // About
    Route::get('/about', 'FrontendController@about')->name('about');
    // Contact
    Route::get('/contact', 'FrontendController@contact')->name('contact');

    // Product
    Route::group(['prefix' => 'product', 'namespace'=>'Product'], function () {
        Route::get('/shop', 'ProductController@shop')->name('product.shop');
        Route::get('/{slug_product}.html', 'ProductController@detail')->name('product.detail');
        Route::get('/filter', 'ProductController@filter')->name('product.filter');
    });
    // Cart
    Route::group(['prefix' => 'cart', 'namespace'=>'Cart'], function () {
        Route::get('/', 'CartController@cart')->name('cart');
        Route::get('/addcart', 'CartController@addToCart')->name('cart.add');
        Route::get('/quickadd/{id_product}', 'CartController@addToCart')->name('cart.quick');
        Route::get('/update/{rowId}/{qty}', 'CartController@updateCart')->name('cart.update');
        Route::get('/delete/{rowId}', 'CartController@delete')->name('cart.delete');
        Route::get('/checkout', 'CartController@checkout')->name('checkout');
        Route::post('/checkout', 'CartController@paid')->name('cart.paid');
        Route::get('/complete', 'CartController@complete')->name('complete');
    });
   
});

// BackEnd
Route::get('login', 'Backend\Auth\LoginController@login')->name('login')->middleware('CheckLogout');
Route::post('login', 'Backend\Auth\LoginController@postLogin');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend','middleware'=>'CheckLogin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/logout','AdminController@logout')->name('logout');
    // Product
    Route::group(['prefix' => 'product', 'namespace'=>'Product'], function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('create', 'ProductController@create')->name('product.create');
        Route::post('store', 'ProductController@store')->name('product.store');
        Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::get('delete/{id}', 'ProductController@delete')->name('product.delete');
    });
    // Category
    Route::group(['prefix' => 'category','namespace'=>'Category'], function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
    });
    // Order
    Route::group(['prefix' => 'orders','namespace'=>'Order'], function () {
        Route::get('/', 'OrderController@orders')->name('orders.index');
        Route::get('/detail/{order_id}', 'OrderController@ordersdetail')->name('orders.detail');
        Route::get('/approve/{order_id}', 'OrderController@approve')->name('orders.approve');
        Route::get('/process', 'OrderController@process')->name('orders.process');
    });
    // User
    Route::group(['prefix' => 'user','namespace'=>'User'], function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('create', 'UserController@create')->name('user.create');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
        Route::get('delete/{id}', 'UserController@delete')->name('user.delete');
    });
});


