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

Route::get('/', [

    'uses' => 'FrontEndController@index'
]);

Route::get('/products/{id}', [

    'uses' => 'FrontEndController@singleProduct',
    'as' => 'products.single'
]);

Route::post('/cart/add', [

    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart', [

    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/cart/delete/{id}', [

    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/incr/{id}/{qty}', [

    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}', [

    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

Route::get('/cart/checkout', [

    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductsController');