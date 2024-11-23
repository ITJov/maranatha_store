<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

// Dashboard
Route::view('/user-dashboard/index', 'user-dashboard.index');

// Ecommerce
Route::view('/ecommerce/ecommerce-orders', 'ecommerce.ecommerce-orders');
Route::view('/ecommerce/ecommerce-customers', 'ecommerce.ecommerce-customers');
Route::get('/ecommerce/product-ecommerce', [ProductController::class, 'index'])->name('product-ecommerce');
Route::get('/ecommerce/create-product-ecommerce', [ProductController::class, 'create'])->name('product.create');
Route::post('/ecommerce/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/ecommerce/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/ecommerce/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/ecommerce/{product}', [ProductController::class, 'destroy'])->name('product.destroy');



// Invoices
Route::view('/invoices/invoices-detail', 'invoices.invoices-detail');
Route::view('/invoices/invoices-list', 'invoices.invoices-list');

// Roles User
Route::get('/roles/index-role', [RoleController::class, 'index'])->name('role-index');
Route::get('/roles/create-role', [RoleController::class, 'create'])->name('role.create');
Route::post('/roles/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

// Customers User
Route::get('/customers/index-customer', [App\Http\Controllers\UserController::class, 'index'])->name('customer-index');
Route::get('/customers/create-customer', [App\Http\Controllers\UserController::class, 'create'])->name('customer-create');
Route::post('/customers/store', [App\Http\Controllers\UserController::class, 'store'])->name('customer.store');
Route::get('/customers/{customer}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('customer.edit');
Route::put('/customers/{customer}', [App\Http\Controllers\UserController::class, 'update'])->name('customer.update');
Route::delete('/customers/{customer}', [App\Http\Controllers\UserController::class, 'destroy'])->name('customer.destroy');


// routes user

