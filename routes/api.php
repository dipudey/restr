<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/restaurant/registration',"Api\RestaurantController@store");
Route::post('/restaurant/login',"Api\RestaurantController@login");

// Restaurant TableController
Route::get('/table/{user_id}',"Api\TableController@index");
Route::post('/table/store',"Api\TableController@store");
Route::post('/table/update/{table_id}',"Api\TableController@update");
Route::post('/table/destroy/{table_id}',"Api\TableController@destroy");

// Restaurant FoodCategoryController
Route::get('/food/category/{user_id}',"Api\FoodCategoryController@index");
Route::post('/food/category/store',"Api\FoodCategoryController@store");
Route::post('/food/category/update/{category_id}',"Api\FoodCategoryController@update");
Route::post('/food/category/destroy/{category_id}',"Api\FoodCategoryController@destroy");

// Resturant FoodController
Route::get('/food/{user_id}',"Api\FoodController@index");
Route::post('/food/store',"Api\FoodController@store");
Route::post('/food/update/{food_id}',"Api\FoodController@update");
Route::post('/food/destroy/{food_id}',"Api\FoodController@destroy");