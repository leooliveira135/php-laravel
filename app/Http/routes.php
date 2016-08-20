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

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['nosso-middleware']], function(){ 
    Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
    Route::delete('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');
    Route::get('/produtos/{id}/altera', 'ProdutoController@altera');
    Route::put('/produtos/atualiza/{id}', 'ProdutoController@atualiza')->where('id', '[0-9]+');
});