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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('API')->name('api.')->group(function(){
	Route::prefix('alunos')->group(function(){

		Route::get('/', 'AlunoController@index')->name('index_alunos');
		Route::get('/{id}', 'AlunoController@show')->name('aluno_especifico');
	});

	Route::prefix('responsavels')->group(function(){

		Route::get('/', 'ResponsavelController@index')->name('index_responsavels');
		Route::get('/{id}', 'ResponsavelController@show')->name('responsavel_especifico');
	});

	Route::prefix('notificacao_colabs')->group(function(){

		Route::get('/', 'NotificacaoColabController@index')->name('index_notificacao_colabs');
		Route::get('/{id}', 'NotificacaoColabController@show')->name('notificacao_colab_especifica');
	});

	Route::prefix('notas')->group(function(){

		Route::get('/', 'NotaController@index')->name('index_notas');
		Route::get('/{id}', 'NotaController@show')->name('nota_especifica');
	});

	Route::prefix('frequencias')->group(function(){

		Route::get('/', 'FrequenciaController@index')->name('index_frequencias');
		Route::get('/{id}', 'FrequenciaController@show')->name('frequencia_especifica');
	});
});