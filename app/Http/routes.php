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

Route::get('/produtos', 
           [
               'as' => 'apelido',
               'uses' =>  'ProdutoController@lista'
           ]);

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove/{id}', [
    'middleware' => 'nosso-middleware',
    'uses' => 'ProdutoController@remove'
]);

Route::get('/produtos/altera/{id}', 'ProdutoController@altera');

Route::group(['middleware' => ['web']], function () {

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/login', 'LoginController@login');