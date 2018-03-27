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

Route::get('/', 'MathHelperController@Index');
Route::get('/h', 'MathHelperController@H');
Route::get('/p', 'MathHelperController@P');
Route::get('/r', 'MathHelperController@R');
