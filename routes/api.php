<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('products','ProductsController');
Route::post('bid/{id}','FrontEndsController@bid');
Route::get('bids/{id}','FrontEndsController@bids');
Route::get('custsBids','FrontEndsController@custsBids');

