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

Route::post('products', 'products\ProductsController@showProducts')->name('product');
Route::post('addcart' , 'cart\CartController@addCart')->name('addCart');
Route::group([ 'prefix' => '/shop' , ['middleware' => 'guest']] ,function() {
    Route::get('/', 'products\ProductsController@category')->name('category');
    Route::get('/detail/{id}', 'products\ProductsController@detailProduct')->name('detail');
    Route::match(['get' , 'post'] , '/filter' , 'products\ProductsController@filter')->name('filter');
});

Route::get('/contact', function() {
    return view('contact\help'); 
})->name('contact');

