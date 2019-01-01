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

Route::post('v1/register', 'AuthController@Register');
Route::post('v1/login', 'AuthController@Login');

Route::get('v1/restock/listrestock', 'RestockController@getList');
Route::post('v1/restock/insertrestock', 'RestockController@addRestock');

Route::get('v1/good/listgoods', 'GoodsController@goodsList');
Route::post('v1/good/detailgood', 'GoodsController@detailGood');

Route::post('v1/good/stock/updatestock','GoodStockController@addStock');
Route::get('v1/good/stock/liststock','GoodStockController@listStock');

