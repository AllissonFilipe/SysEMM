@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Notificação do Colaborador</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notificações dos Colaboradores</a></li>
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

            <form method="POST" action="{{ route('notificacaoColab.put', $notificacao_colab->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo de Notificação</label>
                        <select class="form-control" id="tipo" name="tipo" readOnly>
                            <option value="{{$notificacao_colab->tipo}}" selected>{{$notificacao_colab->tipo}}</option>
                            <option value="Geral">Geral</option>
                            <option value="Turma">Turma</option>
                            <option value="Individual">Individual</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titulo">Título</label> 
                        <input type="text" id="titulo" name="titulo" value="{{$notificacao_colab->titulo}}" class="form-control"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="categoria">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option value="{{$notificacao_colab->categoria}}" selected>{{$notificacao_colab->categoria}}</option>
                            <option value="Evento">Evento</option>
                            <option value="Reunião">Reunião</option>
                            <option value="Advertência">Advertência</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label id="label_user_id" for="user_id">Colaborador</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach($users as $user)
                                @if($user->ativo == true)
                                    @if($user->id == $notificacao_colab->user_id)
                                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label id="label_turma_id" for="turma_id">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            @if($notificacao_colab->turma_id == null)
                                <option disabled selected>Escolha uma opção</option>
                                @foreach($turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                @endforeach
                            @else
                                @foreach($turmas as $turma)
                                    @if($turma->ativo == true)
                                        @if($turma->id == $notificacao_colab->turma_id)
                                            <option value="{{$turma->id}}" selected>{{$turma->nome}}/{{$turma->turno}}</option>
                                        @else
                                            <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @endif   
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label id="label_aluno_id" for="aluno_id">Aluno</label>
                        <select class="form-control" id="aluno_id" name="aluno_id">
                            @if($notificacao_colab->aluno_id == null)
                                <option disabled selected>Escolha uma opção</option>
                                @foreach($alunos as $aluno)
                                    <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                @endforeach
                            @else
                                @foreach($alunos as $aluno)
                                    @if($aluno->ativo == true)
                                        @if($aluno->id == $notificacao_colab->aluno_id)
                                            <option value="{{$aluno->id}}" selected>{{$aluno->nome}}</option>
                                        @else
                                            <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @endif   
                        </select>
                    </div>   
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" cols="30" rows="10">{{$notificacao_colab->descricao}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn_2">Alterar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.notificacaoColab') }}" class="btn_3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tipo').attr("style", "pointer-events: none;");
            var val = $("#tipo").val()
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