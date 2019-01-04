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
Route::post('login', 'AuthController@attemptLogin')->name('login');
Route::get('logout', 'AuthController@logout');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'IndexController@dashboard')
        ->name('dashboard');

    Route::get('storage', 'IndexController@storage')
        ->name('storage');
});