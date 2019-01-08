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

Route::prefix('v1/good')->group(function() {
    Route::get('listgoods', 'GoodsController@goodsList');
    Route::post('detailgood', 'GoodsController@detailGood');
    
    Route::prefix('restock')->group(function() {
        Route::get('listrestock', 'RestockController@getList');
        Route::post('insertrestock', 'RestockController@addRestock');        
    });

    Route::prefix('stock')->group(function() {
        Route::post('insertstock','GoodStockController@addStock');
        Route::post('liststock','GoodStockController@listStock');
    });
});