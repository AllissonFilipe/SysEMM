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
    @if(Auth::user()->tipo == "Coordenador")
        <div class="box">
            <div class="box-header">
                <h3>Fazer Cadastro</h3>
            </div>
            <div class="box-body">
                @include('admin.includes.alerts')

                <form method="POST" action="{{ route('disciplina.post') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="nome">Nome <span class="text-danger">*</span></label> 
                            <input type="text" id="nome" placeholder="Nome" name="nome" class="form-control" required/>
                        <label for="descricao">Descrição <span class="text-danger">*</span></label>
                            <textarea id="descricao" cols="30" rows="6" class="form-control" name="descricao" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>&nbsp&nbsp&nbsp
                        <a href="{{ route('admin.disciplina') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
            <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop