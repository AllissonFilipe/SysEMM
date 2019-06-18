@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Matrícula do Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Matrículas</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Edição da Matrícula</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('turmaAluno.put', $turma_aluno->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group col-md-3">
                        <label for="dt_matricula">Data da Matrícula</label>
                        <input type="date" id="dt_matricula" name="dt_matricula" value="{{$turma_aluno->dt_matricula or old('dt_matricula')}}" class="form-control"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="aluno_id">Aluno</label>
                        <select class="form-control" id="aluno_id" name="aluno_id">
                            @foreach($alunos as $aluno)
                                @if($aluno->id == $turma_aluno->id)
                                    <option value="{{$aluno->id}}" selected>{{$aluno->nome}}</option>
                                @else
                                    <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="turma_id">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            @foreach($turmas as $turma)
                                @if($turma->id == $turma_aluno->id)
                                    <option value="{{$turma->id}}" selected>{{$turma->nome}}/{{$turma->turno}}</option>
                                @else
                                    <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        @if($turma_aluno->dt_cancelamento == null)
                            <label for="dt_cancelamento">Data do Cancelamento</label>
                            <input type="date" id="dt_cancelamento" name="dt_cancelamento" class="form-control"/>
                        @else
                            <label for="dt_cancelamento">Data do Cancelamento</label>
                            <input type="date" id="dt_cancelamento" name="dt_cancelamento" value="{{$turma_aluno->dt_cancelamento or old('dt_cancelamento')}}" class="form-control"/>
                        @endif
                    </div>  
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
@stop