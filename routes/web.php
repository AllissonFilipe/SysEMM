<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    //User
    Route::get('user', 'UserController@index')->name('admin.user');
    Route::post('user', 'UserController@search')->name('admin.user');
    Route::get('createUser', 'UserController@create')->name('user.create');
    Route::post('createUserPost', 'UserController@createPost')->name('user.post');
    Route::get('editUser/{id}', 'UserController@edit')->name('user.edit');
    Route::put('editUserPost/{id}', 'UserController@editPost')->name('user.put');
    Route::delete('deleteUser/{id}', 'UserController@destroy')->name('user.delete');
   
    //Reponsavel
    Route::get('responsavel', 'ResponsavelController@index')->name('admin.responsavel');
    Route::post('responsavel', 'ResponsavelController@search')->name('admin.responsavel');
    Route::get('createResponsavel', 'ResponsavelController@create')->name('responsavel.create');
    Route::post('createResponsavelPost', 'ResponsavelController@createPost')->name('responsavel.post');
    Route::get('editResponsavel/{id}', 'ResponsavelController@edit')->name('responsavel.edit');
    Route::put('editResponsavelPost/{id}', 'ResponsavelController@editPost')->name('responsavel.put');
    Route::delete('deleteResponsavel/{id}', 'ResponsavelController@destroy')->name('responsavel.delete');

    //Discipilina
    Route::get('disciplina', 'DisciplinaController@index')->name('admin.disciplina');
    Route::post('disciplina', 'DisciplinaController@search')->name('admin.disciplina');
    Route::get('createDisciplina', 'DisciplinaController@create')->name('disciplina.create');
    Route::post('createDisciplinaPost', 'DisciplinaController@createPost')->name('disciplina.post');
    Route::get('editDisciplina/{id}', 'DisciplinaController@edit')->name('disciplina.edit');
    Route::put('editDisciplinaPost/{id}', 'DisciplinaController@editPost')->name('disciplina.put');
    Route::delete('deleteDisciplina/{id}', 'DisciplinaController@destroy')->name('disciplina.delete');

    //Aluno
    Route::get('aluno', 'AlunoController@index')->name('admin.aluno');
    Route::post('aluno', 'AlunoController@search')->name('admin.aluno');
    Route::get('createAluno', 'AlunoController@create')->name('aluno.create');
    Route::post('createAlunoPost', 'AlunoController@createPost')->name('aluno.post');
    Route::get('editAluno/{id}', 'AlunoController@edit')->name('aluno.edit');
    Route::put('editAlunoPost/{id}', 'AlunoController@editPost')->name('aluno.put');
    Route::delete('deleteAluno/{id}', 'AlunoController@destroy')->name('aluno.delete');

    //Turma
    Route::get('turma', 'TurmaController@index')->name('admin.turma');
    Route::post('turma', 'TurmaController@search')->name('admin.turma');
    Route::get('createTurma', 'TurmaController@create')->name('turma.create');
    Route::post('createTurmaPost', 'TurmaController@createPost')->name('turma.post');
    Route::get('editTurma/{id}', 'TurmaController@edit')->name('turma.edit');
    Route::put('editTurmaPost/{id}', 'TurmaController@editPost')->name('turma.put');
    Route::delete('deleteTurma/{id}', 'TurmaController@destroy')->name('turma.delete');

    //Notificação do Colaborador
    Route::get('notificacao', 'NotificacaoColabController@index')->name('admin.notificacaoColab');
    Route::post('notificacao', 'NotificacaoColabController@search')->name('admin.notificacaoColab');
    Route::get('createNotificacao', 'NotificacaoColabController@create')->name('notificacaoColab.create');
    Route::post('createNotificacaoColabPost', 'NotificacaoColabController@createPost')->name('notificacaoColab.post');
    Route::get('editNotificacaoColab/{id}', 'NotificacaoColabController@edit')->name('notificacaoColab.edit');
    Route::put('editNotificacaoColabPost/{id}', 'NotificacaoColabController@editPost')->name('notificacaoColab.put');
    Route::delete('deleteNotificacaoColab/{id}', 'NotificacaoColabController@destroy')->name('notificacaoColab.delete');

    //Parâmetro
    Route::get('parametro', 'ParametroController@index')->name('admin.parametro');
    Route::post('parametro', 'ParametroController@search')->name('admin.parametro');
    Route::get('createParametro', 'ParametroController@create')->name('parametro.create');
    Route::post('createParametroPost', 'ParametroController@createPost')->name('parametro.post');
    Route::get('editParametro/{id}', 'ParametroController@edit')->name('parametro.edit');
    Route::put('editParametroPost/{id}', 'ParametroController@editPost')->name('parametro.put');
    Route::delete('deleteParametroColab/{id}', 'ParametroController@destroy')->name('parametro.delete');

    //Matrícula do aluno na turma
    Route::get('matricula', 'TurmaAlunoController@index')->name('admin.turmaAluno');
    Route::post('matricula', 'TurmaAlunoController@search')->name('admin.turmaAluno');
    Route::get('createMatricula', 'TurmaAlunoController@create')->name('turmaAluno.create');
    Route::post('createMatriculaPost', 'TurmaAlunoController@createPost')->name('turmaAluno.post');
    Route::get('editMatricula/{id}', 'TurmaAlunoController@edit')->name('turmaAluno.edit');
    Route::put('editMatriculaPost/{id}', 'TurmaAlunoController@editPost')->name('turmaAluno.put');
    Route::delete('deleteMatricula/{id}', 'TurmaAlunoController@destroy')->name('turmaAluno.delete');

    //Nota
    Route::get('nota', 'NotaController@index')->name('admin.nota');
    Route::post('nota', 'NotaController@index')->name('admin.nota');
    Route::get('createNota', 'NotaController@create')->name('nota.create');
    Route::post('createNotaPost', 'NotaController@createPost')->name('nota.post');
    Route::post('createNotaPostTurma', 'NotaController@createPostTurma')->name('notaTurma.post');
    Route::get('editNota/{id}', 'NotaController@edit')->name('nota.edit');
    Route::get('editNotaList', 'NotaController@editList')->name('nota.list');
    Route::put('editNotaPost/{id}', 'NotaController@editPost')->name('nota.put');
    Route::delete('deleteNota/{id}', 'NotaController@destroy')->name('nota.delete');

    //Frequência
    Route::get('frequencia', 'FrequenciaController@index')->name('admin.frequencia');
    Route::get('frequenciaPost', 'FrequenciaController@indexPost')->name('admin.frequenciaPost');
    Route::get('frequenciaEditPost', 'FrequenciaController@indexEditPost')->name('admin.frequenciaPut');
    Route::get('frequenciaDeletePost', 'FrequenciaController@indexDeletePost')->name('admin.frequenciaDelete');
    // Route::get('createFrequencia', 'FrequenciaController@create')->name('frequencia.create');
    Route::post('createFrequenciaPost', 'FrequenciaController@createPost')->name('frequencia.post');
    Route::put('editFrequenciaPost', 'FrequenciaController@editPost')->name('frequencia.put');
    // Route::get('editDisciplina/{id}', 'DisciplinaController@edit')->name('disciplina.edit');
    // Route::put('editDisciplinaPost/{id}', 'DisciplinaController@editPost')->name('disciplina.put');
    Route::delete('deleteFrequenciaPost', 'FrequenciaController@destroy')->name('frequencia.delete');

    //Alocar User
    Route::get('alocarUser', 'AlocarUserController@index')->name('admin.alocarUser');
    Route::get('createAlocarUser', 'AlocarUserController@create')->name('alocarUser.create');
    Route::post('createAlocarUserPost', 'AlocarUserController@createPost')->name('alocarUser.post');
    Route::get('editAlocarUser/{id}', 'AlocarUserController@edit')->name('alocarUser.edit');
    Route::put('editAlocarUserPost/{id}', 'AlocarUserController@editPost')->name('alocarUser.put');
    Route::delete('deleteAlocarUser/{id}', 'AlocarUserController@destroy')->name('alocarUser.delete');

    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
Route::get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
