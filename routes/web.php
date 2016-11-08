<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' =>'main', 'uses'=>'MainController@index']);

Route::get('/goods', ['as' =>'goods', 'uses'=>'GoodsController@index']);
Route::get('/goods/{id}', 'GoodsController@goodAction');
Route::get('/orders/{id}', 'OrdersController@index');
Route::get('/category/{id}', 'GoodsController@categoryAction');
Route::get('/about', 'MainController@about');
Route::get('/contacts', ['as' =>'contacts', 'uses'=>'MainController@contacts']);

Auth::routes();


Route::get('/home', 'HomeController@index');
Route::post('/goods/{id}','CommentsController@save');
Route::get('/comments/{id}','CommentsController@show');
Route::post('comments/{id}','CommentsController@save');
Route::post('/basket/check','OrdersController@checkOrder');

Route::post('/basket/saveCount','OrdersController@saveCount');
Route::post('/orders/confirmation','OrdersController@saveOrder');
Route::get('/buy/{id}','OrdersController@addToBasket');
Route::post('/buy/{id}','OrdersController@saveToCookies');
Route::get('/basket/','OrdersController@basket');
Route::post('/basket/save','OrdersController@save');
Route::get('/basket/deleteItem/{id}','OrdersController@deleteItem');
Route::post('/basket/clear','OrdersController@clearBasket');
Route::get('/basket/clear','OrdersController@clearBasket');
Route::post('/search','GoodsController@search');

Route::group(['prefix' => 'admin','middleware'=>'auth', 'namespace' => 'Admin'], function() {
    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('','MainController@index');
    Route::get('products', 'productsController@index');
    Route::get('products/delete/{id}', 'productsController@destroy');
    Route::get('products/edit/{id}', 'productsController@edit');
    Route::post('products/update/{id}', 'productsController@update');
    Route::get('products/create/', 'productsController@create');
    Route::post('products/store/', 'productsController@store');

    Route::get('categories', 'categoriesController@index');
    Route::get('categories/delete/{id}', 'categoriesController@destroy');
    Route::get('categories/edit/{id}', 'categoriesController@edit');
    Route::post('categories/update/{id}', 'categoriesController@update');
    Route::get('categories/create/', 'categoriesController@create');
    Route::post('categories/store/', 'categoriesController@store');

Route::get('partners', 'shops_partnersController@index');

    Route::get('comments', 'commentsController@index');
    Route::get('comments/public/{id}', 'commentsController@add');
    Route::get('comments/delete/{id}', 'commentsController@delete');

    Route::get('/home', 'HomeController@index');

    Auth::routes();
});});

