<?php

use Illuminate\Http\Request;

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

Route::get('v1/users', 'UserController@User');
Route::get('v1/restock', 'RestockController@getList');
Route::post('v1/register', 'AuthController@Register');
Route::post('v1/login', 'AuthController@Login');