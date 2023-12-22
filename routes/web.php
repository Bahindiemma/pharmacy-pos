<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Order_detail;

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
    return view('auth.login');
});






Route::get('showuser', [PagesController::class, 'showusers']);
Route::get('addproduct', [PagesController::class, 'addproduct']);
Route::get('grid', [PagesController::class, 'grid']);


Auth::routes();

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resource('orders', OrderController::class);
Route::get('orders-details/{id}', [App\Http\Controllers\OrderController::class,'order_details'])->name('Order_details');
Route::get('orders/receipt/{id}', [App\Http\Controllers\OrderController::class,'order_receipt'])->name('order_receipt');


Route::get('/products/{id}', 'ProductController@show')->name('products.show');

Route::resource('report', OrderDetailController::class);
#// Route::get('reports/list', [App\Http\Controllers\OrderController::class, 'getReports'])->name('reports');
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('users', UserController::class);


Route::resource('companies', CompanyController::class);
Route::resource('transactions', TransactionController::class);
