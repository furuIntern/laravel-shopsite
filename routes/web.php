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


Route::post('addcart' , 'cart\CartController@addCart')->name('addCart');
Route::get('detailCart' ,function() {
    return view('cart\detailCart');
})->name('detailCart');
Route::post('show-items' ,'cart\CartController@itemsCart')->name('items');
Route::post('/edit-cart', 'cart\CartController@editCart')->name('editCart');
Route::group([ 'prefix' => '/shop' , ['middleware' => 'guest']] ,function() {
    Route::get('/',function() {
        return view('shop\mainPage');
    })->name('shop');
    Route::post('/products', 'products\ProductsController@showProducts')->name('product');
    Route::get('/category', 'products\ProductsController@category')->name('category');
    Route::get('/detail/{id}', 'products\ProductsController@detailProduct')->name('detail');
    Route::match(['get' , 'post'] , '/filter' , 'products\ProductsController@filter')->name('filter');
    
});

Route::get('/contact', function() {
    return view('contact\help'); 
})->name('contact');

