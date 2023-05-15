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
    ->can(Permission::CAN_MANAGE_SELF_ACCOUNTS)
    ->name('accounts');

Route::get('create', 'create')
    ->can(Permission::CAN_MANAGE_SELF_ACCOUNTS)
    ->name('accounts/create');

Route::get('{id}/edit', 'edit')
    ->can(Permission::CAN_MANAGE_SELF_ACCOUNTS)
    ->name('accounts/edit');
