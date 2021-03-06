<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' =>  'categoria'], function (){
        Route::get('', 'CategoriasController@pegarDados');
        Route::get('{id}','CategoriasController@pegarCategoria');
        Route::post('','CategoriasController@salvarCategoria');
        Route::put('{id}','CategoriasController@editarCategoria');
        Route::delete('{id}','CategoriasController@deletarCategoria');
    }
);



Route::group(['middleware' => 'auth:admin','prefix' =>  'permissao'], function (){
    Route::get('', 'PermissaoController@index');
    Route::get('tipos/{id}', 'PermissaoController@tipoPermisao');
    Route::get('{id}','PermissaoController@show');
    Route::post('','PermissaoController@store');
    Route::put('{id}','PermissaoController@update');
    Route::delete('{id}','PermissaoController@destroy');
}
);

Route::group(['prefix' =>  'funcionario'], function (){
    Route::get('', 'FuncionarioController@index');
    Route::get('{id}','FuncionarioController@show');
    Route::post('','FuncionarioController@store');
    Route::put('{id}','FuncionarioController@update');
    Route::delete('{id}','FuncionarioController@destroy');
}
);


Route::group([
    'prefix' =>  'auth'
], function (){
        Route::post('login', 'AuthAdminController@login');
        Route::post('refresh', 'AuthAdminController@refresh');
        Route::get('logout', 'AuthAdminController@logout');
    }
);

Route::group([
    'middleware' => 'auth:admin',
    'prefix' => 'auth',
], function () {
    Route::get('me', 'AuthAdminController@me');
});
