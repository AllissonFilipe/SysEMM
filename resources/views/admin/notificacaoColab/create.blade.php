@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Notificação do Colaborador</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notificações dos Colaboradores</a></li>
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

            <form method="POST" action="{{ route('notificacaoColab.post') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo de Notificação</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="Geral" selected>Geral</option>
                            <option value="Turma">Turma</option>
                            <option value="Individual">Individual</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titulo">Título</label> 
                        <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control"/>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option selected disabled>Escolha uma opção</option>
                            <option value="Evento">Evento</option>
                            <option value="Reunião">Reunião</option>
                            <option value="Advertência">Advertência</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label id="label_user_id" for="user_id">Colaborador</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label id="label_turma_id" for="turma_id">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turmas as $turma)
                                <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label id="label_aluno_id" for="aluno_id">Aluno</label>
                        <select class="form-control" id="aluno_id" name="aluno_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($alunos as $aluno)
                                <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn_1">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var val = $("#tipo").val()
            if(val == 'Geral') {
                    $("#label_turma_id").hide();
                    $("#turma_id").hide();
                    $("#label_aluno_id").hide();
                    $("#aluno_id").hide();
            }
            $("#tipo").change(function(){
                val = $(this).val();
                if(val == 'Geral') {
                    $("#label_turma_id").hide();
                    $("#turma_id").hide();
                    $("#label_aluno_id").hide();
                    $("#aluno_id").hide();
                }else if(val == 'Turma') {
                    $("#label_turma_id").show();
                    $("#turma_id").show();
                    $("#label_aluno_id").hide();
                    $("#aluno_id").hide();
                }else if(val == 'Individual') {
                    $("#label_turma_id").hide();
                    $("#turma_id").hide();
                    $("#label_aluno_id").show();
                    $("#aluno_id").show();
                }
            });

            
        });
    </script>
@stop