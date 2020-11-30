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

//PackageControll 
Route::get('/package',"Api\PackageController@index");

// BranchController Routes
Route::post('/branch/login',"Api\BranchController@login");
Route::get('/branch/{user_id}',"Api\BranchController@index");
Route::post('/branch/store',"Api\BranchController@store");
Route::post('/branch/update/{id}',"Api\BranchController@update");
Route::post('/branch/delete/{id}',"Api\BranchController@destroy");

// Restaurant TableController
Route::get('/table/{branch_id}',"Api\TableController@index");
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
Route::get('/category/wise/food/{user_id}/{branch_id}',"Api\FoodController@categoryWiseFood");

// ChefController Routes 
Route::post('/chef/login',"Api\ChefController@login");
Route::get('/chef/{user_id}',"Api\ChefController@index");
Route::post('/chef/store',"Api\ChefController@store");
Route::post('/chef/update/{id}',"Api\ChefController@update");
Route::post('/chef/destroy/{id}',"Api\ChefController@destroy");

// WaiterController Routes 
Route::post('/waiter/login',"Api\WaiterController@login");
Route::get('/waiter/{user_id}',"Api\WaiterController@index");
Route::post('/waiter/store',"Api\WaiterController@store");
Route::post('/waiter/update/{id}',"Api\WaiterController@update");
Route::post('/waiter/destroy/{id}',"Api\WaiterController@destroy");


// Branch Food
Route::get('/category/food/list/{user_id}',"Api\BranchFoodController@categoryWishFood");
Route::post('/branch/food/add/{branch_id}/{food_id}',"Api\BranchFoodController@branchFoodAdd");
Route::get('/branch/food/list/{user_id}/{branch_id}',"Api\BranchFoodController@branchFoodList");
Route::post('/branch/food/delete/{branch_food_id}',"Api\BranchFoodController@deleteFood");
Route::post('/branch/food/status/updated/{branch_food_id}',"Api\BranchFoodController@foodStatusUpdated");

// OrderController 
Route::post('/order',"Api\OrderController@order");
Route::get('/chef/today/food/order/{user_id}/{branch_id}',"Api\OrderController@chefTodayOrder");
Route::post('/chef/order/status/update',"Api\OrderController@statusUpdate");

Route::get('/waiter/today/pending/order/{user_id}/{waiter_id}',"Api\OrderController@waitePendingOrder");
Route::get('/waiter/today/cooking/order/{user_id}/{waiter_id}',"Api\OrderController@waiteCookingOrder");
Route::get('/waiter/today/ready/order/{user_id}/{waiter_id}',"Api\OrderController@waiteReadyOrder");
Route::post('/waiter/order/status/update',"Api\OrderController@waiterStatusUpdate");
Route::get('/waiter/today/order/{waiter_id}',"Api\OrderController@waiterTodayOrder");
Route::post('/food/re/order',"Api\OrderController@foodReOrder");

Route::get('/today/order/status/list/{waiter_id}',"Api\OrderController@todayOrderStatusList");
Route::get('/chef/today/order/status/list/{user_id}/{branch_id}',"Api\OrderController@chefTodayOrderStatusList");

Route::get('/order/live/data/{order_id}',"Api\OrderController@liveData");


Route::get('/branch/dashboard/{branch_id}',"Api\DashboardController@branchDashboard");
Route::get('/branch/waiter/order/{branch_id}',"Api\DashboardController@waiterOrder");
Route::get('/popular/food/{branch_id}',"Api\DashboardController@popularFood");