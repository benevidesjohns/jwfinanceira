<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTypeController;

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

Route::get('/token', function () {
    return csrf_token();
});


// Routes AccountController
Route::controller(AccountController::class)->group(function () {
    Route::post('/account', 'store');
    Route::get('/account/{id}', 'get');
    Route::get('/accounts', 'getList');
    Route::put('/account/{id}', 'update');
    Route::delete('/account/{id}', 'destroy');
});

// Routes AccountTypeController
Route::controller(AccountTypeController::class)->group(function () {
    Route::post('/account_type', 'store');
    Route::get('/account_type/{id}', 'get');
    Route::get('/account_types', 'getList');
    Route::put('/account_type/{id}', 'update');
    Route::delete('/account_type/{id}', 'destroy');
});

// Routes AddressController
Route::controller(AddressController::class)->group(function () {
    Route::post('/address', 'store');
    Route::get('/address/{id}', 'get');
    Route::get('/addresses', 'getList');
    Route::put('/address/{id}', 'update');
    Route::delete('/address/{id}', 'destroy');
});

// Routes CustomerController
Route::controller(CustomerController::class)->group(function () {
    Route::post('/customer', 'store');
    Route::get('/customer/{id}', 'get');
    Route::get('/customers', 'getList');
    Route::put('/customer/{id}', 'update');
    Route::delete('/customer/{id}', 'destroy');
});

// Routes TransactionController
Route::controller(TransactionController::class)->group(function () {
    Route::post('/transaction', 'store');
    Route::get('/transaction/{id}', 'get');
    Route::get('/transactions', 'getList');
    Route::put('/transaction/{id}', 'update');
    Route::delete('/transaction/{id}', 'destroy');
});

// Routes TransactionTypeController
Route::controller(TransactionTypeController::class)->group(function () {
    Route::post('/transaction_type', 'store');
    Route::get('/transaction_type/{id}', 'get');
    Route::get('/transaction_types', 'getList');
    Route::put('/transaction_type/{id}', 'update');
    Route::delete('/transaction_type/{id}', 'destroy');
});
