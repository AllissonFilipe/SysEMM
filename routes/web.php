<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    Route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');
    Route::get('historic', 'BalanceController@historic')->name('admin.historic');

    Route::post('transfer', 'BalanceController@transferStore')->name('transfer.store');
    Route::post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');

    Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    Route::get('deposit', 'BalanceController@deposit')->name('balance.deposit');
    Route::get('balance', 'BalanceController@index')->name('admin.balance');

    //User
    Route::get('user', 'UserController@index')->name('admin.user');
    Route::get('createUser', 'UserController@create')->name('user.create');
    Route::post('createUserPost', 'UserController@createPost')->name('user.post');
    Route::get('editUser/{id}', 'UserController@edit')->name('user.edit');
    Route::put('editUserPost/{id}', 'UserController@editPost')->name('user.put');
    Route::delete('deletetUser/{id}', 'UserController@destroy')->name('user.delete');
   

    //Reponsavel
    Route::get('responsavel', 'ResponsavelController@index')->name('admin.responsavel');
    Route::get('createResponsavel', 'ResponsavelController@create')->name('responsavel.create');

    //Discipilina
    Route::get('disciplina', 'DisciplinaController@index')->name('admin.disciplina');
    Route::get('createDisciplina', 'DisciplinaController@create')->name('disciplina.create');

    //Aluno
    Route::get('aluno', 'AlunoController@index')->name('admin.aluno');
    Route::get('createAluno', 'AlunoController@create')->name('aluno.create');
    Route::post('createAlunoPost', 'AlunoController@createPost')->name('aluno.post');
    Route::get('editAluno/{id}', 'AlunoController@edit')->name('aluno.edit');
    Route::put('editAlunoPost/{id}', 'AlunoController@editPost')->name('aluno.put');
    Route::delete('deletetAluno/{id}', 'AlunoController@destroy')->name('aluno.delete');

    //Turma
    Route::get('turma', 'TurmaController@index')->name('admin.turma');
    Route::get('createTurma', 'TurmaController@create')->name('turma.create');

    //Notificação do Colaborador
    Route::get('notificacao', 'NotificacaoColabController@index')->name('admin.notificacaoColab');
    Route::get('createNotificacao', 'NotificacaoColabController@create')->name('notificacaoColab.create');

    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
Route::get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
