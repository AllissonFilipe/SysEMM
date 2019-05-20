@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Turma</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Turma</a></li>
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
                        <input type="text" id="nome" placeholder="Nome" class="form-control">
                    <label for="turno">Turno</label>
                    <select class="form-control" id="turno" >
                        <option value="mae">Manhã</option>
                        <option value="pai">Tarde</option>
                        <option value="pai">Integral</option>
                    </select>
                    <label for="qtd_vagas">Quantidade de Vagas</label>
                        <input type="number" id="qtd_vagas" placeholder="Quantidade de Vagas" class="form-control">
                    <label for="ano_letivo">Ano Letivo</label>
		                <input class="form-control" id="ano_letivo" type="number" placeholder="Quantidade de Vagas">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop