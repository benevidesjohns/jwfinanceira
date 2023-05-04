<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AccountController;
use App\Http\Controllers\API\AccountTypeController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\TransactionTypeController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Transactions
Route::controller(TransactionController::class)
    ->prefix('transactions')
    ->group(__DIR__ . '/api/crud.php');

// Accounts
Route::controller(AccountController::class)
    ->prefix('accounts')
    ->group(__DIR__ . '/api/crud.php');

// Addresses
Route::controller(AddressController::class)
    ->prefix('addresses')
    ->group(__DIR__ . '/api/crud.php');

// Users
Route::controller(UserController::class)
    ->prefix('users')
    ->group(__DIR__ . '/api/crud.php');

// Account Types
Route::controller(AccountTypeController::class)
    ->prefix('types/account')
    ->group(__DIR__ . '/api/crud.php');

// Transaction Types
Route::controller(TransactionTypeController::class)
    ->prefix('types/transaction')
    ->group(__DIR__ . '/api/crud.php');
