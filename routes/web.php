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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Management
Route::get('management/accounts', function () {
    return view('accounts');
})->name('management/accounts');

Route::get('management/addresses', function () {
    return view('addresses');
})->name('management/addresses');

Route::get('management/users', function () {
    return view('users');
})->name('management/users');

// Types
Route::get('types/account', function () {
    return view('account_types');
})->name('types/account');

Route::get('types/transaction', function () {
    return view('transaction_types');
})->name('types/transaction');

// Transactions
Route::get('transactions', function () {
    return view('transactions');
})->name('transactions');
