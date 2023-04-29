<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::controller(TransactionController::class)->prefix('transactions')->group(__DIR__ . '/api/crud.php');

// Management
Route::controller(AccountController::class)->prefix('management/accounts')->group(__DIR__ . '/api/crud.php');
Route::controller(AddressController::class)->prefix('management/addresses')->group(__DIR__ . '/api/crud.php');
Route::controller(UserController::class)->prefix('management/users')->group(__DIR__ . '/api/crud.php');

// Types
Route::controller(AccountTypeController::class)->prefix('types/account')->group(__DIR__ . '/api/crud.php');
Route::controller(TransactionTypeController::class)->prefix('types/transaction')->group(__DIR__ . '/api/crud.php');
