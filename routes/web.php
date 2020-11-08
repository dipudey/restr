<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//AdminController Routes
Route::get('/admin/home',"Admin\DashboardController@index")->name('admin.dashboard');
Route::get('/admin', 'AdminController@showLoginForm');
Route::post('/admin', 'AdminController@login')->name('admin.login');

Route::prefix('admin')->middleware(['auth:admin'])->group(base_path('routes/admin.php'));

Route::group(['middleware' => ['auth'],'prefix' => 'restarunt'],function() {

    Route::get('/table',"Restarunt\TableController@index")->name('table');
    Route::post('/table/store','Restarunt\TableController@store')->name('table.store');
    Route::get('/table/edit/{id}',"Restarunt\TableController@edit")->name('table.edit');
    Route::post('/table/update','Restarunt\TableController@update')->name('table.update');
    Route::get('/table/destroy/{id}',"Restarunt\TableController@destroy")->name('table.destroy');

    Route::get('/food-category',"Restarunt\FoodCategoryController@index")->name('food.category');
    Route::post('/food-category/store',"Restarunt\FoodCategoryController@store")->name('food.category.store');
    Route::get('/food-category/edit/{id}',"Restarunt\FoodCategoryController@edit")->name('food.category.edit');
    Route::post('/food-category/update',"Restarunt\FoodCategoryController@update")->name('food.category.update');
    Route::get('/food-category/destroy/{id}',"Restarunt\FoodCategoryController@destroy")->name('food.category.destroy');

    Route::get('/food',"Restarunt\FoodController@index")->name('food');
    Route::get('/food/create',"Restarunt\FoodController@create")->name('food.create');
    Route::post('/food/store',"Restarunt\FoodController@store")->name('food.store');
    Route::get('/food/{id}/edit',"Restarunt\FoodController@edit")->name('food.edit');
    Route::post('/food/update',"Restarunt\FoodController@update")->name('food.update');
    Route::get('/food/{id}/destroy',"Restarunt\FoodController@destroy")->name('food.destroy');

    //ChefController Routes 
    Route::get('/chef','Restarunt\ChefController@index')->name('chef');
    Route::get('/chef/create','Restarunt\ChefController@create')->name('chef.create');
    Route::post('/chef/store','Restarunt\ChefController@store')->name('chef.store');
    Route::post('/chef/update','Restarunt\ChefController@update')->name('chef.update');
    Route::get('/chef/{id}/edit','Restarunt\ChefController@edit')->name('chef.edit');
    Route::get('/chef/{id}/destroy','Restarunt\ChefController@destroy')->name('chef.destroy');


    //WaiterController Routes 
    Route::get('/waiter','Restarunt\WaiterController@index')->name('waiter');
    Route::get('/waiter/create','Restarunt\WaiterController@create')->name('waiter.create');
    Route::post('/waiter/store','Restarunt\WaiterController@store')->name('waiter.store');
    Route::post('/waiter/update','Restarunt\WaiterController@update')->name('waiter.update');
    Route::get('/waiter/{id}/edit','Restarunt\WaiterController@edit')->name('waiter.edit');
    Route::get('/waiter/{id}/destroy','Restarunt\WaiterController@destroy')->name('waiter.destroy');

});