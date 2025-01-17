<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);

Route::get('{any}', [UserDashboardController::class, 'index'])->name('user.dashboard');

Route::get('/product/index',[ProductController::class, 'showUser'])->name('product.index');
Route::get('/product/category/{category}', [ProductController::class, 'filterByCategory'])->name('product.category');
Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');


Route::get('/product/{id}', [DetailProductController::class, 'show'])->name('product.detail');
Route::post('/product/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');

Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

Route::middleware(['is_admin'])->group(function () {
    //-----------------bagian admin---------------------
    // Ecommerce
    Route::get('/admin-dashboard/index', [HomeController::class, 'root'])->name('home');
    Route::view('/ecommerce/ecommerce-orders', 'ecommerce.ecommerce-orders');
    Route::get('/ecommerce/product-ecommerce', [ProductController::class, 'index'])->name('product-ecommerce');
    Route::get('/ecommerce/create-product-ecommerce', [ProductController::class, 'create'])->name('product.create');
    Route::post('/ecommerce/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/ecommerce/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/ecommerce/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/ecommerce/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/ecommerce/product/{id}/addStock', [ProductController::class, 'addStock'])->name('product.addStock');
    Route::put('/product/{id}/hide', [ProductController::class, 'hide'])->name('product.hide');
    Route::put('/product/{id}/unhide', [ProductController::class, 'unhide'])->name('product.unhide');
    Route::get('/ecommerce/product-hide-ecommerce', [ProductController::class, 'hiddenProducts'])->name('product.hidden');

    // Category
    Route::get('/ecommerce/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/ecommerce/category/create-category', [CategoryController::class, 'create'])->name('category.create');
    ROute::post('/ecommerce/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/ecommerce/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('ecommerce/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/ecommerce/category/{id}/hide', [CategoryController::class, 'hide'])->name('category.hide');
    Route::put('/ecommerce/category/{id}/unhide', [CategoryController::class, 'unhide'])->name('category.unhide');
    Route::get('/ecommerce/category/hidden',[CategoryController::class, 'hiddenCategory'])->name('category.hidden');

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
    Route::put('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    // // Product
    // Route::get('/product/index', [ProductController::class, 'showUser'])->name('product.index');
    // Route::get('/product/category/{category_id}', [ProductController::class, 'filterByCategory'])->name('product.category');
    // Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');

    // // // Detail Product
    // Route::get('/product/{id}', [DetailProductController::class, 'show'])->name('product.detail');
    // Route::post('/product/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');

    // Profile
    Route::get('/user-profile/index', [ProfileController::class, 'index'])->name('user-profile.index')->middleware('auth');
    Route::get('/user-profile/resetPassword', [ProfileController::class, 'resetPassword'])->name('user-profile.reset-password')->middleware('auth');
    Route::post('/user-profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth');

    // Payment
    Route::get('/payments/index', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payments/pay', [PaymentController::class, 'payView'])->name('payment.pay');


    // Invoice User Page
    Route::get('/invoice_user/invoice-index', [UserInvoiceController::class, 'generateInvoice'])->name('invoice.index');
    Route::post('/invoice_user/invoice-index', [UserInvoiceController::class, 'generateInvoice'])->name('invoice.index');
    

    // Invoice History User Page
    Route::get('/invoice_user/history', [UserInvoiceController::class, 'historyInvoice'])->name('invoice.history');
    Route::get('/invoice_user/invoice/{id}', [UserInvoiceController::class, 'showInvoice'])->name('invoice.detail');

});