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
Route::get('products/name/{searchKey}', 'Api\ProductController@searchByName');
Route::get('products/tag/{tag}','Api\ProductController@getTag');
Route::get('products/price/{mode}', 'Api\ProductController@getPrice');
Route::get('products/size/{size}', 'Api\ProductController@getSize');
Route::get('products/category_id/{brand_id}', 'Api\ProductController@getBrand');
Route::get('products/OS/{os}', 'Api\ProductController@getOS');
Route::get('review/{product}', 'Api\ReviewController@show');

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::post('Update', 'Api\AuthController@sendUpdate');


Route::middleware('auth:api')->group(function () {

    Route::post('orders', 'Api\OrderController@store');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('me', 'Api\AuthController@me');
    Route::post('refresh', 'Api\AuthController@refresh');

    Route::get('cart', 'Api\CartController@show');
    Route::post('cart/add', 'Api\CartController@store');
    Route::patch('cart/up/{item}', 'Api\CartController@update');
    Route::delete('cart/del/{item}', 'Api\CartController@destroy');

    Route::post('review/add', 'Api\ReviewController@store');

});
