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

Route::get('/', 'ContactsController@index');
Route::get('/add', 'ContactsController@addForm');
Route::get('/contact/{id}', 'ContactsController@details');
Route::get('/contact/{id}/edit', 'ContactsController@editForm');

Route::post('/add', 'ContactsController@add');
Route::post('/contact/{id}/edit', 'ContactsController@edit');
Route::get('/contact/{id}/delete', 'ContactsController@delete');

Route::get('/phone/{contact_id}/add', 'PhonesController@addForm');
Route::post('/phone/{contact_id}/add', 'PhonesController@add');
Route::get('/phone/{id}/delete', 'PhonesController@delete');

Route::get('/website/{contact_id}/add', 'WebsitesController@addForm');
Route::post('/website/{contact_id}/add', 'WebsitesController@add');
Route::get('/website/{id}/delete', 'WebsitesController@delete');
