<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

// Home Page (ADMIN, CUSTOMER)
Route::redirect('/', 'home');
Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Auth::routes();

// DataTables
Route::get('/accounts/show', [AccountController::class, 'show']);
Route::get('/accounts/show-self', [AccountController::class, 'showSelf']);
Route::get('/types/accounts/show', [AccountTypeController::class, 'show']);
Route::get('/transactions/show', [TransactionController::class, 'show']);
Route::get('/transactions/show-self', [TransactionController::class, 'showSelf']);
Route::get('/types/transactions/show', [TransactionTypeController::class, 'show']);
Route::get('/users/show', [UserController::class, 'show']);

// Management (ADMIN)
Route::controller(AccountController::class)
    ->prefix('management/accounts')
    ->group(__DIR__ . '/web/admin/accounts.php');

Route::controller(UserController::class)
    ->prefix('management/users')
    ->group(__DIR__ . '/web/admin/users.php');

Route::controller(TransactionController::class)
    ->prefix('management/transactions')
    ->group(__DIR__ . '/web/admin/transactions.php');

// Types (ADMIN)
Route::controller(AccountTypeController::class)
    ->prefix('types/account')
    ->group(__DIR__ . '/web/admin/account_types.php');

Route::controller(TransactionTypeController::class)
    ->prefix('types/transaction')
    ->group(__DIR__ . '/web/admin/transaction_types.php');

// Accounts (ADMIN, CUSTOMER)
Route::controller(AccountController::class)
    ->prefix('accounts')
    ->group(__DIR__ . '/web/accounts.php');


// Transactions (ADMIN, CUSTOMER)
Route::controller(TransactionController::class)
    ->prefix('transactions')
    ->group(__DIR__ . '/web/transactions.php');

// Profile
Route::get('/profile/{id}/edit', [UserController::class, 'editProfile'])->name('profile/edit');
Route::put('/profile/{id}', [UserController::class, 'onEditProfile'])->name('profile/onEdit');
