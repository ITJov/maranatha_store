<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

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

// User
Route::view('/user-dashboard/index', 'user-dashboard.index');

// Ecommerce
Route::view('/ecommerce/ecommerce-products', 'ecommerce.ecommerce-products');
Route::view('/ecommerce/ecommerce-orders', 'ecommerce.ecommerce-orders');
Route::view('/ecommerce/ecommerce-customers', 'ecommerce.ecommerce-customers');
Route::view('/ecommerce/ecommerce-add-product', 'ecommerce.ecommerce-add-product');

// Invoices
Route::view('/invoices/invoices-detail', 'invoices.invoices-detail');
Route::view('/invoices/invoices-list', 'invoices.invoices-list');

// Roles
Route::get('/roles/index-role', [RoleController::class, 'index'])->name('role-index');
Route::get('/roles/create-role', [RoleController::class, 'create'])->name('role.create');
Route::post('/roles/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

