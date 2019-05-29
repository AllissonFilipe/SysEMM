@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Turma</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Turmas</a></li>
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

            <form method="POST" action="{{ route('turma.put', $turma->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" name="nome" value="{{$turma->nome or old('nome')}}" class="form-control">
                    <label for="turno">Turno</label>
                    <select class="form-control" id="turno" name="turno">
                        <option value="{{$turma->turno or old('turno')}}" selected>{{$turma->turno or old('turno')}}</option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Integral">Integral</option>
                    </select>
                    <label for="qtd_vagas">Quantidade de Vagas</label>
                        <input type="number" id="qtd_vagas" name="qtd_vagas" value="{{$turma->qtd_vagas or old('qtd_vagas')}}" class="form-control">
                    <label for="ano_letivo">Ano Letivo</label>
		                <input class="form-control" id="ano_letivo" name="ano_letivo" type="number" value="{{$turma->ano_letivo or old('ano_letivo')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop