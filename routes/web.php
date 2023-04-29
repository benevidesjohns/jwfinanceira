<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Management
Route::get('management/accounts', [AccountController::class, 'index'])->name('management/accounts');

Route::get('management/addresses', [AddressController::class, 'index'])->name('management/addresses');

Route::get('management/users', [UserController::class, 'index'])->name('management/users');

// Types
Route::get('types/account', [AccountTypeController::class, 'index'])->name('types/account');

Route::get('types/transaction', [TransactionTypeController::class, 'index'])->name('types/transaction');

// Transactions
Route::get('transactions', [TransactionController::class, 'index'])->name('transactions');
