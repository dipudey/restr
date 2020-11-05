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
