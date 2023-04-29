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

Route::get('', 'index')
    ->middleware('permission:' . Permission::CAN_MANAGE_TRANSACTIONS . '|' . Permission::CAN_READ_SELF_TRANSACTIONS)
    ->name('transactions');
