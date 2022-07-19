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

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('inicio');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/products/buy/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'buy'])->name('products.buy');
    Route::get('/order/success', [App\Http\Controllers\Frontend\ProductController::class, 'orderSuccess'])->name('order.success');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/invoices/', [App\Http\Controllers\Backend\InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/run', [App\Http\Controllers\Backend\InvoiceController::class, 'invoicesRun'])->name('invoices.run');
    Route::get('/invoices/run-success', [App\Http\Controllers\Backend\InvoiceController::class, 'invoicesRunSuccess'])->name('invoices.run.success');
    Route::get('/invoices/show/{id}', [App\Http\Controllers\Backend\InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/products/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('products.delete');
    Route::resource('products', App\Http\Controllers\Backend\ProductController::class);
});

