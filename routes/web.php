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
Route::get('/profile',"HomeController@profile")->name('restarunt.profile');
Route::post('/profile/update',"HomeController@profileUpdate")->name('restarunt.profile.update');
Route::get('/change/password',"HomeController@changePassword")->name('change.password');
Route::post('/password/update',"HomeController@passwordUpdate")->name('password.update');

//AdminController Routes
Route::get('/admin/home',"Admin\DashboardController@index")->name('admin.dashboard');
Route::get('/admin', 'AdminController@showLoginForm')->middleware('adminguest');
Route::post('/admin', 'AdminController@login')->name('admin.login');
Route::get('/admin/profile',"HomeController@profile")->name('admin.profile');

//BrachController Routes 
Route::get('/branch', 'BranchController@showLoginForm')->middleware('branchguest');
Route::post('/branch/login', 'BranchController@login')->name('branch.login');

Route::prefix('admin')->middleware(['auth:admin'])->group(base_path('routes/admin.php'));

Route::group(['middleware' => ['auth'],'prefix' => 'restarunt'],function() {

    // BranchController 
    Route::get('/branch',"Restarunt\BranchController@index")->name('branch');
    Route::get('/branch/create',"Restarunt\BranchController@create")->name('branch.create');
    Route::post('/branch/store','Restarunt\BranchController@store')->name('branch.store');
    Route::get('/branch/edit/{id}',"Restarunt\BranchController@edit")->name('branch.edit');
    Route::post('/branch/update','Restarunt\BranchController@update')->name('branch.update');
    Route::get('/branch/destroy/{id}',"Restarunt\BranchController@destroy")->name('branch.destroy');

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

    // ProductController Routes 
    Route::get('/product',"Restarunt\ProductController@index")->name('product');
    Route::post('/product/store',"Restarunt\ProductController@store")->name('product.store');
    Route::get('/product/{id}/edit',"Restarunt\ProductController@edit")->name('product.edit');
    Route::post('/product/update',"Restarunt\ProductController@update")->name('product.update');
    Route::get('/product/{id}/destroy',"Restarunt\ProductController@destroy")->name('product.destroy');

    // SupplierController  Routes 
    Route::get('/supplier',"Restarunt\SupplierController@index")->name('supplier');
    Route::post('/supplier/store',"Restarunt\SupplierController@store")->name('supplier.store');
    Route::get('/supplier/{id}/edit',"Restarunt\SupplierController@edit")->name('supplier.edit');
    Route::post('/supplier/update',"Restarunt\SupplierController@update")->name('supplier.update');
    Route::get('/supplier/{id}/destroy',"Restarunt\SupplierController@destroy")->name('supplier.destroy');

    // PurchaseController  Routes 
    Route::get('/purchase',"Restarunt\PurchaseController@index")->name('purchase');
    Route::get('/purchase-product',"Restarunt\PurchaseController@create")->name('purchase.create');
    Route::post('/purchase/store',"Restarunt\PurchaseController@store")->name('purchase.store');
    Route::get('/purchase/{id}/edit',"Restarunt\PurchaseController@edit")->name('purchase.edit');
    Route::post('/purchase/update',"Restarunt\PurchaseController@update")->name('purchase.update');
    Route::get('/purchase/{id}/destroy',"Restarunt\PurchaseController@destroy")->name('purchase.destroy');

    // StockContoller Routes 
    Route::get('/stock',"Restarunt\StockController@index")->name('stock');


    // ExpenseController Routes 
    Route::get('/expense-type',"Restarunt\ExpenseController@index")->name('expense.type');
    Route::post('/expense-type/store',"Restarunt\ExpenseController@store")->name('expense.type.store');
    Route::get('/expense-type/{id}/edit',"Restarunt\ExpenseController@edit")->name('expense.type.edit');
    Route::post('/expense-type/update',"Restarunt\ExpenseController@update")->name('expense.type.update');
    Route::get('/expense-type/{id}/destroy',"Restarunt\ExpenseController@destroy")->name('expense.type.destroy');

    Route::get('/expense',"Restarunt\ExpenseController@expenseList")->name('expense');
    Route::post('/expense/store',"Restarunt\ExpenseController@expenseStore")->name('expense.store');
    Route::get('/expense/{id}/edit',"Restarunt\ExpenseController@expenseEdit")->name('expense.edit');
    Route::post('/expense/update',"Restarunt\ExpenseController@expenseUpdate")->name('expense.update');
    Route::get('/expense/{id}/destroy',"Restarunt\ExpenseController@expenseDelete")->name('expense.destroy');


    // ReservarionController  Routes 
    Route::get('/reservation',"Restarunt\ReservationController@index")->name('reservation');
    Route::get('/reservation-add',"Restarunt\ReservationController@create")->name('reservation.create');
    Route::post('/reservation/store',"Restarunt\ReservationController@store")->name('reservation.store');
    Route::get('/reservation/{id}/edit',"Restarunt\ReservationController@edit")->name('reservation.edit');
    Route::post('/reservation/update',"Restarunt\ReservationController@update")->name('reservation.update');
    Route::get('/reservation/{id}/destroy',"Restarunt\ReservationController@destroy")->name('reservation.destroy');
    Route::get('/reservation/branch/table/{branch_id}',"Restarunt\ReservationController@reservationTable");

    // SaleController Routes
    Route::get('/today/sale/food',"Restarunt\SaleController@todaySaleFoodList")->name('today.sale.food');
    Route::get('/today/sale',"Restarunt\SaleController@todaySale")->name('today.sale');
    Route::get('/sale',"Restarunt\SaleController@sale")->name('sale');
    Route::get('/invoice/{id}',"Restarunt\SaleController@invoice")->name('sale.invoice');

    // ReportController Routes
    Route::get('/sale/report',"Restarunt\ReportController@saleReport")->name('sale.report');
    Route::get('/expense/report',"Restarunt\ReportController@expenseReport")->name('expense.report');
    Route::get('/purches/report',"Restarunt\ReportController@purchesReport")->name('purches.report');


});



Route::group(['middleware' => ['auth:branch'],'prefix' => 'branch'],function() {
    Route::get('/home',"Branch\DashboardController@index")->name('branch.dashboard');
    Route::get('/profile',"Branch\DashboardController@profile")->name('branch.profile');
    Route::post('/profile/update',"Branch\DashboardController@profileUpdate")->name('branch.profile.update');
    Route::get('/change/password',"Branch\DashboardController@changePassword")->name('branch.change.password');
    Route::post('/password/update',"Branch\DashboardController@passwordUpdate")->name('branch.password.update');

    // PosController Routes
    Route::get('/pos',"Branch\PosController@pos")->name('pos');
    Route::post('/food/category',"Branch\PosController@foodCategory");
    Route::post('/cart',"Branch\PosController@cart");
    Route::get('/cart/list',"Branch\PosController@cartList");
    Route::get('/cart/remove/{id}',"Branch\PosController@cartRemove");
    Route::get('/cart/increment/{id}',"Branch\PosController@increment");
    Route::get('/cart/decrement/{id}',"Branch\PosController@decrement");
    Route::post('/sale/food',"Branch\PosController@sale")->name('sale.food');
    

    Route::get('/food/list',"Branch\DashboardController@foodList")->name('branch.food.list');
    Route::post('/food/add',"Branch\DashboardController@branchFoodAdd")->name('branch.food.add');
    Route::post('/food/status',"Branch\DashboardController@branchFoodStatus")->name('branch.food.status');

    // TableController Routes 
    Route::get('/table',"Restarunt\TableController@index")->name('table');
    Route::post('/table/store','Restarunt\TableController@store')->name('table.store');
    Route::get('/table/edit/{id}',"Restarunt\TableController@edit")->name('table.edit');
    Route::post('/table/update','Restarunt\TableController@update')->name('table.update');
    Route::get('/table/destroy/{id}',"Restarunt\TableController@destroy")->name('table.destroy');

    // TableController Routes 
    Route::get('/customer',"Branch\CustomerController@index")->name('customer');
    Route::post('/customer/store','Branch\CustomerController@store')->name('customer.store');
    Route::get('/customer/edit/{id}',"Branch\CustomerController@edit")->name('customer.edit');
    Route::post('/customer/update','Branch\CustomerController@update')->name('customer.update');
    Route::get('/customer/destroy/{id}',"Branch\CustomerController@destroy")->name('customer.destroy');

    // SupplierController  Routes 
    Route::get('/supplier',"Branch\SupplierController@index")->name('branch.supplier');
    Route::post('/supplier/store',"Branch\SupplierController@store")->name('branch.supplier.store');
    Route::get('/supplier/{id}/edit',"Branch\SupplierController@edit")->name('branch.supplier.edit');
    Route::post('/supplier/update',"Branch\SupplierController@update")->name('branch.supplier.update');
    Route::get('/supplier/{id}/destroy',"Branch\SupplierController@destroy")->name('branch.supplier.destroy');

    // PurchaseController  Routes 
    Route::get('/purchase',"Branch\PurchaseController@index")->name('branch.purchase');
    Route::get('/purchase-product',"Branch\PurchaseController@create")->name('branch.purchase.create');
    Route::post('/purchase/store',"Branch\PurchaseController@store")->name('branch.purchase.store');
    Route::get('/purchase/{id}/edit',"Branch\PurchaseController@edit")->name('branch.purchase.edit');
    Route::post('/purchase/update',"Branch\PurchaseController@update")->name('branch.purchase.update');
    Route::get('/purchase/{id}/destroy',"Branch\PurchaseController@destroy")->name('branch.purchase.destroy');

    // StockController Routes 
    Route::get("/stock","Branch\StockController@stock")->name('branch.stock');
    Route::get("/stock/out","Branch\StockController@stockOut")->name('stock.out');
    Route::post("/stock/out","Branch\StockController@out")->name('out.stock');
    Route::get('/product/json',"Branch\StockController@product");
    Route::get('/product/{product_id}',"Branch\StockController@productDetails");

    Route::get('/today/order',"Branch\OrderController@todayOrder")->name('branch.today.order');
    Route::get('/take/{order_id}/payment',"Branch\OrderController@takePayment")->name('take.payment');
    Route::post('/take/payment',"Branch\OrderController@takePaymentSubmit")->name('take.payment.submit');
    Route::get('/sale',"Branch\OrderController@sale")->name('branch.sale');
    Route::get('/sale/{order_id}/invoice',"Branch\OrderController@invoice")->name('branch.sale.invoice');
});

