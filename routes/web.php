<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\PurchasingDetailController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::get('/', [ProductController::class, 'index'])->name('dashboard');



// Role
Route::get('/role-index', [RoleController::class, 'index'])->name('role-index');
Route::get('/role-create', [RoleController::class, 'create'])->name('role-create');
Route::post('/role-store', [RoleController::class, 'store'])->name('role-store');
Route::get('/role-edit/{role}', [RoleController::class, 'edit'])->name('role-edit');


// Medicine
Route::get('/medicine', [ProductController::class, 'index'])->name('medicine-index');
Route::get('/medicine-detail/{medicine}', [ProductController::class, 'show'])->name('medicine-detail');
Route::get('/medicine-create', [ProductController::class, 'create'])->name('medicine-create');
Route::post('/medicine-store', [ProductController::class, 'store'])->name('medicine-store');
Route::get('/medicine-edit/{medicine}', [ProductController::class, 'edit'])->name('medicine-edit');
Route::post('/medicine-update/{medicine}', [ProductController::class, 'update'])->name('medicine-update');
Route::delete('/medicine-delete/{medicine}', [ProductController::class, 'destroy'])->name('medicine-delete');

// Cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
