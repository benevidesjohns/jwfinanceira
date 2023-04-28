<?php

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

Route::post('', 'store');
Route::get('/{id}', 'get');
Route::get('', 'getList');
Route::put('/{id}', 'update');
Route::delete('/{id}', 'destroy');
