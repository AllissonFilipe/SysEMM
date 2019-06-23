@extends('adminlte::page')

@section('title', 'Editar Alocação')

@section('content_header')
    <h1>Editar Alocação do Professor</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alocações</a></li>
        <li><a href="">Editar Alocação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Edição da Alocação</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('alocarUser.put', $alocar_user->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">

                    <div class="form-group col-md-4">
                        <label for="turma_id">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            @foreach($turmas as $turma)
                                @if($alocar_user->turma_id == $turma->id)
                                    <option value="{{$turma->id}}" selected>{{$turma->nome}}/{{$turma->turno}}</option>
                                @else
                                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="disciplina_id">Disciplina</label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            @foreach($disciplinas as $disciplina)
                                @if($alocar_user->disciplina_id == $disciplina->id)
                                    <option value="{{$disciplina->id}}" selected>{{$disciplina->nome}}</option>
                                @else
                                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_id">Professor</label>
                        <select class="form-control" id="user_id" name="user_id" readOnly>
                            @foreach($users as $user)
                                @if($alocar_user->user_id == $user->id)
                                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn_1">Alterar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#user_id').attr("style", "pointer-events: none;");
        });
    </script>
@stop