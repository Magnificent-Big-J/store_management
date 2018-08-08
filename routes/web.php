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
    return view('index');
});

Auth::routes();
Route::get('/admin/user','FrontEndsController@loginUser')->name('sign.in');
Route::get('/admin/user','FrontEndsController@product_bid')->name('product.bid');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('products','ProductsController');
    //Route::get('','');
});
