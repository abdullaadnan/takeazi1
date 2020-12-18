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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//
//});
Route::group([
    'middleware'=>'api',
    'prefix'=>'product',
    ],function () {
    Route::get('get-all-products', 'ProductController@index');
    Route::get('get-product/{product_id}', 'ProductController@SelectById');
    Route::post('add-product', 'ProductController@create');
    Route::post('update-product/{product_id}', 'ProductController@update');
});
Route::group([
    'middleware'=>'api',
    'prefix'=>'category',
],function () {
    Route::get('get-all-category', 'CategoryController@index');
    Route::get('get-category/{category_id}', 'CategoryController@SelectById');
    Route::post('add-category', 'CategoryController@create');
    Route::post('update-category/{category_id}', 'CategoryController@update');
});
Route::group([
    'middleware'=>'api',
    'prefix'=>'shop',
],function (){
    Route::post('add-shop','ShopController@create');
    Route::post('update-shop/{shop_id}','ShopController@update');
    Route::get('get-all-shop','ShopController@index');
    Route::get('get-shop/{shop_id}','ShopController@SelectById');
});
Route::group([
    'middleware'=>'api',
    'prefix'=>'staff',
],function (){
    Route::post('add-staff','StaffController@create');
    Route::post('update-staff/{staff_id}','StaffController@update');
    Route::get('get-all-staff','StaffController@index');
    Route::get('get-staff/{staff_id}','StaffController@SelectById');
});




