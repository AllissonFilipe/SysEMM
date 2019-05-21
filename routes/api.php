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

		Route::get('/', 'AlunoController@indexApi')->name('index_alunos');
		Route::get('/{id}', 'AlunoController@showApi')->name('aluno_especifico');
	});

	Route::prefix('responsaveis')->group(function(){

		Route::get('/', 'ResponsavelController@indexApi')->name('index_responsaveis');
		Route::get('/{id}', 'ResponsavelController@showApi')->name('responsavel_especifico');
	});

	Route::prefix('notificacao_colabs')->group(function(){

		Route::get('/', 'NotificacaoColabController@indexApi')->name('index_notificacao_colabs');
		Route::get('/{id}', 'NotificacaoColabController@showApi')->name('notificacao_colab_especifico');
	});

	Route::prefix('notas')->group(function(){

		Route::get('/', 'NotaController@indexApi')->name('index_notas');
		Route::get('/{id}', 'NotaController@showApi')->name('nota_especifico');
	});
});