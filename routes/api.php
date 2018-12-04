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
    return response()->json($request->user());
});

Route::get('products', 'Api\ProductController@index')->name('api.index');
Route::get('products/{product}', 'Api\ProductController@show');

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');



Route::middleware('auth:api')->group(function () {

    Route::post('orders', 'Api\OrderController@store');
    Route::post('logout', 'Api\AuthController@logout');
    Route::get('me', 'Api\AuthController@me');
    Route::post('refresh', 'Api\AuthController@refresh');

    Route::get('cart', 'Api\CartController@show');
    Route::post('cart/add', 'Api\CartController@store');
    Route::patch('cart/{item}', 'Api\CartController@update');
    Route::delete('cart/{item}', 'Api\CartController@destroy');

});
