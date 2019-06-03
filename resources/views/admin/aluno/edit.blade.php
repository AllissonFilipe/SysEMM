@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alunos</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Edição</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form action="{{ route('aluno.put', $aluno->id) }}" method="POST"  enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" name="nome" value="{{$aluno->nome or old('nome')}}" class="form-control"/>
                    <label for="data_de_nascimento">Data de Nascimento</label>
                        <input type="date" id="data_de_nascimento" class="form-control" name="data_de_nascimento" value="{{$aluno->data_de_nascimento or old('data_de_nascimento')}}"/>
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo">
                            <option value="{{$aluno->sexo or old('sexo')}}" selected>{{$aluno->sexo or old('sexo')}}</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Masculino">Masculino</option>
                    </select><br>
                    <label for="rg">RG</label>
                        <input type="text" id="rg" name="rg" value="{{$aluno->rg or old('rg')}}" class="form-control"/>
                    <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" value="{{$aluno->cpf or old('cpf')}}" class="form-control"/>
                    <label for="senha">Senha para acesso ao sistema</label>
                        <input type="password" id="senha" name="senha" value="{{$aluno->senha or old('senha')}}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
@stop