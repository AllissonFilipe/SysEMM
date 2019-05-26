@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alunos</a></li>
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

            <form method="POST" action="{{ route('aluno.post') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" require/>
                    <label for="data_de_nascimento">Data de Nascimento</label>
                        <input type="date" id="data_de_nascimento" name="data_de_nascimento" class="form-control"/>
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo">
                            <option selected disabled>Escolha uma opção</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Masculino">Masculino</option>
                    </select><br>
                    <label for="rg">RG</label>
                        <input type="text" id="rg" name="rg" placeholder="RG" class="form-control"/>
                    <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-control"/>
                    <label for="senha">Senha para acesso ao sistema</label>
                        <input type="password" id="senha" name="senha" placeholder="Senha" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop