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

});