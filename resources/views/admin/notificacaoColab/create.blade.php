@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Notificação do Colaborador</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notificação do Colaborador</a></li>
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
                    <label for="titulo">Título</label> 
                        <input type="text" id="titulo" placeholder="Título" class="form-control"/>
                    <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" cols="30" rows="10"></textarea>
                    <label for="tipo">Tipo de Notificação</label>
		            <select class="form-control" id="tipo">
			            <option value="Geral">Geral</option>
                        <option value="Turma">Turma</option>
                        <option value="Individual">Individual</option>
		            </select>
                    <label for="categoria">Categoria</label>
		            <select class="form-control" id="categoria">
			            <option value="Evento">Evento</option>
                        <option value="Reunião">Reunião</option>
                        <option value="Advertência">Advertência</option>
		            </select>
                    <label for="turma">Turma</label>
		            <select class="form-control" id="turma">
			            <option value="">Falta Implementar</option>
		            </select>
                    <label for="aluno">Aluno</label>
		            <select class="form-control" id="aluno">
			            <option value="">Falta Implementar</option>
		            </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop