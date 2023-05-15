<?php

use App\Helpers\Permission;
use Illuminate\Support\Facades\Route;

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

Route::get('', 'indexSelf')
    ->can(Permission::CAN_READ_SELF_TRANSACTIONS)
    ->name('transactions');

Route::get('create', 'create')
    ->can(Permission::CAN_CREATE_SELF_TRANSACTION)
    ->name('transactions/create');

Route::post('create', 'onCreate')
    ->can(Permission::CAN_CREATE_SELF_TRANSACTION)
    ->name('transactions/store');
