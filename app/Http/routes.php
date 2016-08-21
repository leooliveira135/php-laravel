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

Route::get('/', 'ProdutoController@lista');

Route::get('mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('novo', 'ProdutoController@novo');

Route::get('json', 'ProdutoController@listaJson');

Route::get('home', 'HomeController@index');

Route::post('adiciona', 'ProdutoController@adiciona');

Route::get('remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');

Route::get('{id}/altera', 'ProdutoController@altera')->where('id', '[0-9]+');

Route::get('atualiza/{id}', 'ProdutoController@atualiza')->where('id', '[0-9]+');

Route::resource('produtos', 'ProdutoController');

Route::auth();