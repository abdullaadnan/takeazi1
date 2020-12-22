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
    Route::get('get-product/{id}', 'ProductController@SelectById');
    Route::post('add-product', 'ProductController@create');
    Route::post('update-product/{id}', 'ProductController@update');
});
Route::group([
    'middleware'=>'api',
    'prefix'=>'shop',
],function (){
    Route::post('add-shop','ShopController@create');
    Route::post('update-shop/{id}','ShopController@update');
    Route::get('get-all-shop','ShopController@index');
    Route::get('get-shop/{id}','ShopController@SelectById');
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
Route::group([
    'middleware'=>'api',
    'prefix'=>'product_category',
],function (){
    Route::post('add-product-category','ProductCategoryController@create');
    Route::post('update-product-category/{id}','ProductCategoryController@update');
    Route::get('get-all-product-category','ProductCategoryController@index');
    Route::get('get-product-category/{id}','ProductCategoryController@SelectById');
});
Route::group([
    'middleware'=>'api',
    'prefix'=>'product_subcategories',
],function (){
    Route::post('add-product-subcategories','ProductSubcategoryController@create');
    Route::post('update-product-subcategories/{id}','ProductSubcategoryController@update');
    Route::get('get-all-product-subcategories','ProductSubcategoryController@index');
    Route::get('get-product-subcategories/{id}','ProductSubcategoryController@SelectById');
    //Route::post('upload','ProductSubcategoryController@upload');
});




