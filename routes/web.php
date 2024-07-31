<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\Invoice_detailController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\Function_medicinalController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\Preparation_typeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Product_detailController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('domain')->name('domain.')->group(function () {
            Route::get('/index', [DomainController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [DomainController::class, 'detail'])->name('detail');
            Route::get('/search', [DomainController::class, 'search'])->name('search');
            Route::post('/store', [DomainController::class, 'store'])->name('store');
            Route::post('/delete', [DomainController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/index', [UserController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
            Route::get('/search', [UserController::class, 'search'])->name('search');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::post('/delete', [UserController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('/index', [CustomerController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('detail');
            Route::get('/search', [CustomerController::class, 'search'])->name('search');
            Route::post('/store', [CustomerController::class, 'store'])->name('store');
            Route::post('/delete', [CustomerController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('supplier')->name('supplier.')->group(function () {
            Route::get('/index', [SupplierController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [SupplierController::class, 'detail'])->name('detail');
            Route::get('/search', [SupplierController::class, 'search'])->name('search');
            Route::post('/store', [SupplierController::class, 'store'])->name('store');
            Route::post('/delete', [SupplierController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('function_medicinal')->name('function_medicinal.')->group(function () {
            Route::get('/index', [Function_medicinalController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [Function_medicinalController::class, 'detail'])->name('detail');
            Route::get('/search', [Function_medicinalController::class, 'search'])->name('search');
            Route::post('/store', [Function_medicinalController::class, 'store'])->name('store');
            Route::post('/delete', [Function_medicinalController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('voucher')->name('voucher.')->group(function () {
            Route::get('/index', [VoucherController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [VoucherController::class, 'detail'])->name('detail');
            Route::get('/search', [VoucherController::class, 'search'])->name('search');
            Route::post('/store', [VoucherController::class, 'store'])->name('store');
            Route::post('/delete', [VoucherController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('preparation_type')->name('preparation_type.')->group(function () {
            Route::get('/index', [Preparation_typeController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [Preparation_typeController::class, 'detail'])->name('detail');
            Route::get('/search', [Preparation_typeController::class, 'search'])->name('search');
            Route::post('/store', [Preparation_typeController::class, 'store'])->name('store');
            Route::post('/delete', [Preparation_typeController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/index', [CategoryController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [CategoryController::class, 'detail'])->name('detail');
            Route::get('/search', [CategoryController::class, 'search'])->name('search');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::post('/delete', [CategoryController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/index', [ProductController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
            Route::get('/search', [ProductController::class, 'search'])->name('search');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::post('/delete', [ProductController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('product_detail')->name('product_detail.')->group(function () {
            Route::get('/index', [Product_detailController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [Product_detailController::class, 'detail'])->name('detail');
            Route::get('/search', [Product_detailController::class, 'search'])->name('search');
            Route::post('/store', [Product_detailController::class, 'store'])->name('store');
            Route::post('/delete', [Product_detailController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('image')->name('image.')->group(function () {
            Route::get('/index', [ImageController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [ImageController::class, 'detail'])->name('detail');
            Route::get('/search', [ImageController::class, 'search'])->name('search');
            Route::post('/store', [ImageController::class, 'store'])->name('store');
            Route::post('/delete', [ImageController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('invoice')->name('invoice.')->group(function () {
            Route::get('/index', [InvoiceController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [InvoiceController::class, 'detail'])->name('detail');
            Route::get('/search', [InvoiceController::class, 'search'])->name('search');
            Route::post('/store', [InvoiceController::class, 'store'])->name('store');
            Route::post('/delete', [InvoiceController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('invoice_detail')->name('invoice_detail.')->group(function () {
            Route::get('/index', [Invoice_detailController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [Invoice_detailController::class, 'detail'])->name('detail');
            Route::get('/search', [Invoice_detailController::class, 'search'])->name('search');
            Route::post('/store', [Invoice_detailController::class, 'store'])->name('store');
            Route::post('/delete', [Invoice_detailController::class, 'destroy'])->name('destroy');
        });
    });

});
