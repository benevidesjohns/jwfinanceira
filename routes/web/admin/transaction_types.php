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
    ->can(Permission::CAN_MANAGE_TYPES)
    ->name('types/transaction');

Route::get('create', 'create')
    ->can(Permission::CAN_MANAGE_TYPES)
    ->name('types/transaction/create');

Route::post('create', 'onCreate')
    ->can(Permission::CAN_MANAGE_TYPES)
    ->name('types/transaction/store');

Route::get('{id}/edit', 'edit')
    ->can(Permission::CAN_MANAGE_TYPES)
    ->name('types/transaction/edit');

Route::get('{id}', 'onEdit')
    ->can(Permission::CAN_MANAGE_TYPES)
    ->name('types/transaction/update');
