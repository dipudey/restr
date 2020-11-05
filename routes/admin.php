<?php 

// ResturantController Routes
Route::get('/restaurant',"Admin\ResturantController@index")->name('restaurant');
Route::get('/restaurant/create',"Admin\ResturantController@create")->name('restaurant.create');
Route::post('/restaurant/registration',"Admin\ResturantController@registration")->name('restaurant.registration');
Route::get('/restaurant/{id}/edit',"Admin\ResturantController@edit")->name('restaurant.edit');
Route::post('/restaurant/update',"Admin\ResturantController@update")->name('restaurant.update');
Route::get('/restaurant/{id}/destroy',"Admin\ResturantController@destroy")->name('restaurant.destroy');