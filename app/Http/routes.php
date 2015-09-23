<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('/apimemorias', 'ApiMemoriasController');

Route::get('/apimemorias/categoria/{cat}', 'ApiMemoriasController@showcat');

Route::get('/', 'MemoriasController@index');
Route::get('/fotos', 'MemoriasController@fotos');
Route::get('/sobre', 'MemoriasController@sobre');
Route::get('/categoria/{cat}', 'MemoriasController@cat');

Route::resource('/memorias', 'MemoriasController');

Route::get('/bairro', 'MemoriasController@bairro');

Route::get('/teste', 'MemoriasController@teste');

