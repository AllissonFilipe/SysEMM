<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    $this->any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');
    $this->get('historic', 'BalanceController@historic')->name('admin.historic');

    $this->post('transfer', 'BalanceController@transferStore')->name('transfer.store');
    $this->post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');

    $this->post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    $this->get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    $this->post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    $this->get('deposit', 'BalanceController@deposit')->name('balance.deposit');
    $this->get('balance', 'BalanceController@index')->name('admin.balance');

    //User
    $this->get('user', 'UserController@index')->name('admin.user');
    $this->get('createUser', 'UserController@create')->name('user.create');
   

    //Reponsavel
    $this->get('responsavel', 'ResponsavelController@index')->name('admin.responsavel');
    $this->get('createResponsavel', 'ResponsavelController@create')->name('responsavel.create');

    //Discipilina
    $this->get('disciplina', 'DisciplinaController@index')->name('admin.disciplina');
    $this->get('createDisciplina', 'DisciplinaController@create')->name('disciplina.create');

    //Aluno
    $this->get('aluno', 'AlunoController@index')->name('admin.aluno');
    $this->get('createAluno', 'AlunoController@create')->name('aluno.create');

    //Turma
    $this->get('turma', 'TurmaController@index')->name('admin.turma');
    $this->get('createTurma', 'TurmaController@create')->name('turma.create');

    $this->get('/', 'AdminController@index')->name('admin.home');
});

$this->post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
$this->get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
