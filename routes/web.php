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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('addcart' , 'cart\CartController@addCart')->name('addCart');
Route::post('show-items' ,'cart\CartController@itemsCart')->name('items');
Route::post('/edit-cart', 'cart\CartController@editCart')->name('editCart');
Route::get('shop', function() {
        return view('shop\mainPage');
    })->name('shop');
Route::group([ 'prefix' => '/shop' , ['middleware' => 'guest']] ,function() {
    
    Route::post('/products', 'products\ProductsController@showProducts')->name('product');
    Route::get('/category', 'products\ProductsController@category')->name('category');
    Route::get('/detail/{id}', 'products\ProductsController@detailProduct')->name('detail');
    Route::match(['get' , 'post'] , '/filter' , 'products\ProductsController@filter')->name('filter');
    Route::group( ['prefix' => 'cart'] ,function() {
        Route::get('/' ,function() {
            return view('cart\detailCart');
        })->name('detailCart');
        Route::post( '/delete-item' , 'cart\CartController@deleteItem')->name('delete');
        Route::get('/checkout', function() {
            return view('checkout\form');
        })->name('checkout');
        Route::post('/submitCart', 'OrderController@submit')->name('submitOrder');    
    }); 
});

Route::group(['prefix' => 'user'], function() {
    Route::post('/updateProfile', 'user\UserController@updatePro')->name('updateProfile');
    Route::get('/show-order','user\UserController@ShowOrder')->name('showOrder');
});

Route::get('/contact', function() {
    return view('contact\help'); 
})->name('contact');
=======
Route::get('/','Auth\LoginController@showLoginForm');
Auth::routes();
Route::get('logout','Auth\LoginController@logout')->name('get-logout');


Route::group(['middleware'=>['permission:manage setting']],function(){
    Route::get('admin/setting','Admin\SettingController@index')->name('show-setting');
    Route::post('admin/setting/description','Admin\SettingController@store');
    Route::post('admin/setting/title','Admin\SettingController@update');
    Route::post('admin/setting/logo','Admin\SettingController@logo');
    Route::post('admin/setting/sortBy','Admin\SettingController@sort');
    Route::get('admin/category/show/{category}','Admin\CategoriesController@edit');
    Route::get('admin/category/hidden/{category}','Admin\CategoriesController@hidden');
    Route::get('admin/category/delete/{category}','Admin\CategoriesController@destroy');
    Route::post('admin/category/level/{category}','Admin\CategoriesController@update');
});

/**
 * 
 * 
 * 
 * Member
 */
Route::group(['middleware'=>['permission:manage members']], function(){
    Route::get('admin/members','Admin\MemberController@index')->name('show-members');
    Route::post('admin/members/add','Admin\MemberController@store');
    Route::get('admin/member/{user}','Admin\MemberController@show');
    Route::post('admin/member/update/{user}','Admin\MemberController@update');
    Route::get('admin/member/delete/{user}','Admin\MemberController@destroy');
});

/**
 * 
 * 
 * Order
 */
Route::group(['middleware'=>['permission:manage orders']],function(){
    Route::get('admin/orders','Admin\OrderController@index')->name('show-orders');
    Route::get('admin','Admin\OrderController@index')->name('admin-page');
    Route::view('ajax/add/ProductInOrder','admin\ajax\AddProductInOrder')->name('add-productForm-order');
    Route::post('admin/order/add','Admin\OrderController@store');

});


Route::group(['middleware'=>['permission:manage products']],function(){
    Route::get('admin/products','Admin\ProductController@index')->name('show-products');
    Route::post('admin/categories/add','Admin\CategoriesController@create')->name('add-categories');
    Route::get('admin/categories/option','Admin\CategoriesController@display')->name('option-categories');
    Route::get('admin/category/option/{categories}','Admin\CategoriesController@show')->name('option-category');
    Route::post('admin/products/add','Admin\ProductController@store')->name('add-product');
    Route::post('admin/category/add','Admin\CategoriesController@store')->name('add-category');
    Route::get('admin/product/{product}','Admin\ProductController@show')->name('display-product');
    Route::post('admin/product/update/{product}','Admin\ProductController@update');
    Route::post('admin/product/{product}/edit','Admin\ProductController@edit');
    Route::get('admin/product/delete/{product}','Admin\ProductController@destroy');
});

>>>>>>> origin/trung-admin

