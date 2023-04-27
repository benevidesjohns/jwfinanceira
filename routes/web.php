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

Route::get('accounts', function () {
    return view('accounts');
})->name('accounts');

Route::get('account_types', function () {
    return view('account_types');
})->name('account_types');

Route::get('addresses', function () {
    return view('addresses');
})->name('addresses');

Route::get('transactions', function () {
    return view('transactions');
})->name('transactions');

Route::get('transaction_types', function () {
    return view('transaction_types');
})->name('transaction_types');

Route::get('users', function () {
    return view('users');
})->name('users');
