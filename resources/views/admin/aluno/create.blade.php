@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Aluno</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Cadastro</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" placeholder="Nome" class="form-control"/>
                    <label for="data_de_nascimento">Data de Nascimento</label>
                        <input type="date" id="data_de_nascimento" class="form-control"/>
                    <label for="rg">RG</label>
                        <input type="text" id="rg" placeholder="RG" class="form-control"/>
                    <label for="cpf">CPF</label>
                        <input type="text" id="cpf" placeholder="CPF" class="form-control"/>
                    <label for="senha">Senha para acesso ao sistema</label>
                        <input type="password" id="senha" placeholder="Senha" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop