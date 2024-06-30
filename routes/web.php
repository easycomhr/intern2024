<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\UserController;
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
    });

});
