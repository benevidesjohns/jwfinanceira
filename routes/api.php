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

Route::controller(AccountController::class)->prefix('accounts')->group(__DIR__ . '/api/crud.php');
Route::controller(AccountTypeController::class)->prefix('account_types')->group(__DIR__ . '/api/crud.php');
Route::controller(AddressController::class)->prefix('addresses')->group(__DIR__ . '/api/crud.php');
Route::controller(TransactionController::class)->prefix('transactions')->group(__DIR__ . '/api/crud.php');
Route::controller(TransactionTypeController::class)->prefix('transaction_types')->group(__DIR__ . '/api/crud.php');
Route::controller(UserController::class)->prefix('users')->group(__DIR__ . '/api/crud.php');
