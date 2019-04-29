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

Route::get('/','Auth\LoginController@showLoginForm');
Auth::routes();
Route::get('logout','Auth\LoginController@logout')->name('get-logout');


Route::group(['middleware'=>['permission:manage setting']],function(){
    Route::get('admin/setting','Admin\SettingController@index')->name('show-setting');
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

});


Route::group(['middleware'=>['permission:manage products']],function(){
    Route::get('admin/products','Admin\ProductController@index')->name('show-products');
    Route::post('admin/categories/add','Admin\CategoriesController@create')->name('add-categories');
    Route::get('admin/categories/option','Admin\CategoriesController@display')->name('option-categories');
    Route::get('admin/category/option/{categories}','Admin\CategoriesController@show')->name('option-category');
    Route::post('admin/products/add','Admin\ProductController@store')->name('add-product');
    Route::post('admin/category/add','Admin\CategoriesController@store')->name('add-category');
    Route::get('admin/product/{product}','Admin\ProductController@show')->name('display-product');
    Route::get('admin/product/','Admin\ProductController@update')->name('update-product');
});


