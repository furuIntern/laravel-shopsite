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
Route::get('/login','Auth\LoginController@showLoginForm');
Auth::routes(['verify' => true]);
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
    Route::get('admin/role/delete/{role}','Admin\MemberController@deleteRole')->name('delete-role');
    Route::post('admin/role/add/','Admin\MemberController@addRole')->name('add-role');
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
    Route::post('admin/order/update/state/{order}','Admin\OrderController@updateState');
    Route::get('admin/order/detail/{order}','Admin\OrderController@show');
    Route::get('admin/order/delete/{order}','Admin\OrderController@destroy')->name('delete-order');
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


Route::get('/', 'products\ProductsController@showProducts')->name('product');


Auth::routes();

Route::match([ 'get','post' ],'/home', 'HomeController@index')->name('home');

/**
 * 
 * 
 * Cart
 */
Route::post('/addcart' , 'cart\CartController@addCart')->name('addCart');
Route::post('/show-items' ,'cart\CartController@itemsCart')->name('items');
Route::post('/edit-cart', 'cart\CartController@editCart')->name('editCart');
Route::post('/delete-Cart', 'cart\CartController@deleteCart')->name('deleteCart');

/**
 * 
 * 
 * Shop
 */
Route::group([ 'prefix' => '/shop' , ['middleware' => 'guest']] ,function() {
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

/**
 * 
 * 
 * User
 */
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

