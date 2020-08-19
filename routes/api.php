<?php

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

Route::post('/users', 'UserController@store');
Route::get('/users', 'UserController@getAll');
Route::get('/users/{id}', 'UserController@find');

Route::post('/users/{user_id}/transactions', 'TransactionController@store');
Route::get('/users/{user_id}/transactions', 'TransactionController@getAll');
Route::get('/users/{user_id}/transactions/{id}', 'TransactionController@find');

