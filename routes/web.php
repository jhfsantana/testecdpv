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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/inicio', 'Contacts\ContactController@index');
Route::get('/cadastro', 'Contacts\ContactController@form');
Route::post('/contact/save', 'Contacts\ContactController@save');
Route::get('/alterar/{id}', 'Contacts\ContactController@edit');
Route::post('/contact/edit', 'Contacts\ContactController@update');
Route::get('/contact/remove/{id}', 'Contacts\ContactController@remove');