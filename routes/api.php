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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::get('v1/products/','apiController@goodsIndex')->middleware('auth:api');
Route::get('v1/products/category/{id}', 'apiController@categoryIndex')->middleware('auth:api');
Route::get('v1/products/{id}', 'apiController@goodsIdIndex')->middleware('auth:api');
Route::get('v1/users/','apiController@usersIndex')->middleware('auth:api');

Route::post('v1/orders/', 'apiController@putOrderIndex')->middleware('auth:api');

Route::delete ('v1/orders/{id}', 'apiController@deleteOrder')->middleware('auth:api');
