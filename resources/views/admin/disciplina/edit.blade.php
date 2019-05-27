@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Disciplina</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Disciplinas</a></li>
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

            <form method="POST" action="{{ route('disciplina.put', $disciplina->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" value="{{$disciplina->nome or old('nome')}}" name="nome" class="form-control">
                    <label for="descricao">Descrição</label>
                        <textarea id="descricao" cols="30" rows="6" class="form-control" name="descricao">{{$disciplina->descricao or old('descricao')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>
@stop