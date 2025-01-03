<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserInvoiceController;


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

// Route::get('/', function(){
//     return view('welcome');
// })->middleware('is_admin');


Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

Route::middleware(['is_admin'])->group(function () {
    //-----------------bagian admin---------------------
    // Ecommerce
    Route::view('/ecommerce/ecommerce-orders', 'ecommerce.ecommerce-orders');
    Route::get('/ecommerce/product-ecommerce', [ProductController::class, 'index'])->name('product-ecommerce');
    Route::get('/ecommerce/create-product-ecommerce', [ProductController::class, 'create'])->name('product.create');
    Route::post('/ecommerce/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/ecommerce/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/ecommerce/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/ecommerce/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/ecommerce/product/{id}/addStock', [ProductController::class, 'addStock'])->name('product.addStock');

    // Order
    Route::get('/ecommerce/orders-ecommerce', [OrderController::class, 'index'])->name('orders.index');

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

    // Customers User
    Route::get('/customers/index-customer', [App\Http\Controllers\UserController::class, 'index'])->name('customer-index');
    Route::get('/customers/create-customer', [App\Http\Controllers\UserController::class, 'create'])->name('customer-create');
    Route::post('/customers/store', [App\Http\Controllers\UserController::class, 'store'])->name('customer.store');
    Route::get('/customers/{customer}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('customer.edit');
    Route::put('/customers/{customer}', [App\Http\Controllers\UserController::class, 'update'])->name('customer.update');
    Route::delete('/customers/{customer}', [App\Http\Controllers\UserController::class, 'destroy'])->name('customer.destroy');

    //----------------admin end---------------------
});

// Rute untuk User
Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('/user-dashboard/index', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Cart
    Route::get('/carts/cart-index', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/carts/cart-index/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');

    // Product
    Route::get('/product/index',[ProductController::class, 'showUser'])->name('product.index');
    Route::get('/product/category/{category}', [ProductController::class, 'filterByCategory'])->name('product.category');

    // Detail Product
    Route::get('/product/{id}', [DetailProductController::class, 'show'])->name('product.detail');
    Route::post('/product/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');

    // Profile
    Route::get('/user-profile/index', [ProfileController::class, 'index'])->name('user-profile.index')->middleware('auth');
    Route::get('/user-profile/resetPassword', [ProfileController::class, 'resetPassword'])->name('user-profile.reset-password')->middleware('auth');
    Route::post('/user-profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth');

    // Payment
    //Route::get('/payments/payment-index', [PaymentController::class, 'index'])->name('payment.index');

    // invoice user page
    Route::get('/invoice_user/invoice-index', [UserInvoiceController::class, 'generateInvoice'])->name('invoice.index');
    //Route::post('/invoice_user/invoice-index', [UserInvoiceController::class, 'generateInvoice'])->name('invoice.index');

    // Payment
    Route::get('/payments/payment-index', [PaymentController::class, 'index'])->name('payment.index');

    // Invoice User Page
    Route::post('/invoice_user/invoice-index', [UserInvoiceController::class, 'generateInvoice'])->name('invoice.index');

});