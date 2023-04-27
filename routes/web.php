<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTypeController;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', 'home');

Route::get('/token', function () {
    return csrf_token();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Routes AccountController
Route::controller(AccountController::class)->group(function () {
    Route::post('/accounts', 'store');
    Route::get('/accounts/{id}', 'get');
    Route::get('/accounts', 'getList');
    Route::put('/accounts/{id}', 'update');
    Route::delete('/accounts/{id}', 'destroy');
});

// Routes AccountTypeController
Route::controller(AccountTypeController::class)->group(function () {
    Route::post('/account_types', 'store');
    Route::get('/account_types/{id}', 'get');
    Route::get('/account_types', 'getList');
    Route::put('/account_types/{id}', 'update');
    Route::delete('/account_types/{id}', 'destroy');
});

// Routes AddressController
Route::controller(AddressController::class)->group(function () {
    Route::post('/addresses', 'store');
    Route::get('/addresses/{id}', 'get');
    Route::get('/addresses', 'getList');
    Route::put('/addresses/{id}', 'update');
    Route::delete('/addresses/{id}', 'destroy');
});

// Routes UserController
Route::controller(UserController::class)->group(function () {
    Route::post('/users', 'store');
    Route::get('/users/{id}', 'get');
    Route::get('/users', 'getList');
    Route::put('/users/{id}', 'update');
    Route::delete('/users/{id}', 'destroy');
});

// Routes TransactionController
Route::controller(TransactionController::class)->group(function () {
    Route::post('/transactions', 'store');
    Route::get('/transactions/{id}', 'get');
    Route::get('/transactions', 'getList');
    Route::put('/transactions/{id}', 'update');
    Route::delete('/transactions/{id}', 'destroy');
});

// Routes TransactionTypeController
Route::controller(TransactionTypeController::class)->group(function () {
    Route::post('/transaction_types', 'store');
    Route::get('/transaction_types/{id}', 'get');
    Route::get('/transaction_types', 'getList');
    Route::put('/transaction_types/{id}', 'update');
    Route::delete('/transaction_types/{id}', 'destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
