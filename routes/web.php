<?php

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

Route::get('/', 'AuthController@form')->name('home');
Route::post('', 'AuthController@attemptLogin')->name('login');
Route::get('logout', 'AuthController@logout');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'IndexController@dashboard')
        ->name('dashboard');

    Route::prefix('storages')->group(function(){
        Route::get('/', 'IndexController@storage')
            ->name('storages');
        Route::get('new', 'Storages\NewController@index');
        Route::post('new', 'Storages\NewController@goods')
            ->name('newgoods'); 
        Route::get('{id}/edit', 'Storages\EditController@edit');
        Route::post('', 'Storages\EditController@editGoods')
            ->name('editgoods');
        Route::get('view', 'Storages\ViewController@view');
    });
    Route::prefix('account')->group(function(){
        Route::get('/', 'IndexController@account')
            ->name('account');
        Route::get('new', 'Account\NewController@index');
        Route::post('', 'Account\NewController@newAccount')
            ->name('newaccount');
    });
    
    Route::prefix('profile')->group(function(){
        Route::get('/', 'IndexController@profile')
            ->name('profile');
        Route::post('', 'Profiles\UpdateController@update')
            ->name('updateprofile');
    });
});