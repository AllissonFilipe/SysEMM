@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Realizar Matrícula do Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Matrículas</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Matrícula</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('turmaAluno.post') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group col-md-4">
                        <label for="dt_matricula">Data da Matrícula</label>
                        <input type="date" id="dt_matricula" name="dt_matricula" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="aluno_id">Aluno</label>
                        <select class="form-control" id="aluno_id" name="aluno_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($alunos as $aluno)
                                <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="turma_id">Turma</label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turmas as $turma)
                                <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop