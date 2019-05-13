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
})->name('index');

Auth::routes();

Route::match([ 'get','post' ],'/home', 'HomeController@index')->name('home');


Route::post('addcart' , 'cart\CartController@addCart')->name('addCart');
Route::post('show-items' ,'cart\CartController@itemsCart')->name('items');
Route::post('/edit-cart', 'cart\CartController@editCart')->name('editCart');

Route::group([ 'prefix' => '/shop' , ['middleware' => 'guest']] ,function() {

    Route::get('', 'products\ProductsController@showProducts')->name('product');
    Route::get('/category', 'products\ProductsController@category')->name('category');
    Route::get('/detail/{id}', 'products\ProductsController@detailProduct')->name('detailProduct');
    Route::match(['get' , 'post'] , '/filter' , 'products\ProductsController@filter')->name('filter');
    Route::post('/upComment','user\CommentController@upComment')->name('addComment');
    Route::group( ['prefix' => 'cart'] ,function() {

        Route::get('/' ,'cart\CartController@showCart')->name('detailCart');
        Route::post( '/delete-item' , 'cart\CartController@deleteItem')->name('delete');
        Route::get('/checkout', function() {
            return view('checkout\form');
        })->name('checkout');

        Route::post('/submitCart', 'OrderController@submit')->name('submitOrder');    
    }); 
});

Route::group(['prefix' => 'user'], function() {

    Route::post('/detail-order', 'user\UserController@detailOrder')->name('detail');
    Route::get('/edit-order/{id}','user\UserController@editOrder')->name('edit');
    Route::get('/profile','user\UserController@showProfile')->name('profile');
    Route::post('/profile','user\UserController@upProfile')->name('upProfile');
    Route::post('/delete','user\UserController@deleteOrder')->name('deleteOrder');

});

Route::get('/contact', function() {

    return view('contact\help'); 
})->name('contact');

