@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Disciplina</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Disciplinas</a></li>
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

            <form method="POST" action="{{ route('disciplina.post') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" placeholder="Nome" name="nome" class="form-control">
                    <label for="descricao">Descrição</label>
                        <textarea id="descricao" cols="30" rows="6" class="form-control" name="descricao"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn_1">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop