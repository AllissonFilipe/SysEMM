@extends('adminlte::page')

@section('title', 'Nova Alocação')

@section('content_header')
    <h1>Realizar Alocação do Professor</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alocações</a></li>
        <li><a href="">Nova Alocação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Realizar Alocação</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('alocarUser.post') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group col-md-4">
                        <label for="turma_id">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turmas as $turma)
                                @if($turma->ativo == true)
                                    <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="disciplina_id">Disciplina</label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($disciplinas as $disciplina)
                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_id">Professor</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($users as $user)
                                @if($user->ativo == true)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn_2">Cadastrar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.alocarUser') }}" class="btn_3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop