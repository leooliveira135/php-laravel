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

Route::controller('/','Auth\AuthController');

Route::get('/produtos', 
           [
               'as' => 'apelido',
               'uses' =>  'ProdutoController@lista'
           ]);

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::group(['middleware' => ['web']], function () {
    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    
    Route::post('/produtos/adiciona', [
        'middleware' => 'nosso-middleware',
        'uses' => 'ProdutoController@adiciona'
    ]);
    
    Route::get('/produtos/remove/{id}', [
        'middleware' => 'nosso-middleware',
        'uses' => 'ProdutoController@remove'
    ]);    

    Route::get('/login', [
        'as' => 'entrar',
        'middleware' => 'nosso-middleware',
        'uses' => 'LoginController@login',
    ]);

    Route::get('/logout', [
        'as' => 'sair',
        'middleware' => 'nosso-middleware',
        'uses' => 'LoginController@logout',
    ]);
    
    
    Route::get('/home', 'HomeController@index');
    
    Route::auth();
});

Route::get('/produtos/{id}/altera', 'ProdutoController@altera');

Route::put('/produtos/atualiza/{id}', 'ProdutoController@atualiza');