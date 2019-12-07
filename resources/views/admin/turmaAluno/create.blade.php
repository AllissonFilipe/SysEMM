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
    @if(Auth::user()->tipo == "Coordenador")
        <div class="box">
            <div class="box-header">
                <h3>Fazer Matrícula</h3>
            </div>
            <div class="box-body">
                @include('admin.includes.alerts')

                <form method="POST" action="{{ route('turmaAluno.post') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-group col-md-6">
                            <label for="aluno_id">Aluno</label>
                            <select class="form-control" id="aluno_id" name="aluno_id" required>
                                <option selected disabled>Escolha uma opção</option>
                                @foreach($alunos as $aluno)
                                    @if($aluno->ativo == true)
                                        <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="turma_id">Turma</label>
                            <select class="form-control" id="turma_id" name="turma_id" required>
                                <option selected disabled>Escolha uma opção</option>
                                @foreach($turmas as $turma)
                                    @if($turma->ativo == true)
                                        <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> 
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Cadastrar</button>&nbsp&nbsp&nbsp
                        <a href="{{ route('admin.turmaAluno') }}" class="btn btn-default">Cancelar</a>
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