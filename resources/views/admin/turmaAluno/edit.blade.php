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
    @if(Auth::user()->tipo == "Coordenador")
        <div class="box">
            <div class="box-header">
                <h3>Fazer Edição da Matrícula</h3>
            </div>
            <div class="box-body">
                @include('admin.includes.alerts')

                <form method="POST" action="{{ route('turmaAluno.put', $turma_aluno->id) }}" onsubmit="return confirm('Confirma a alteração ?')">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-group col-md-4">
                            <label for="aluno_id">Aluno <span class="text-danger">*</span></label>
                            <select class="form-control" id="aluno_id" name="aluno_id" required>
                                @foreach($alunos as $aluno)
                                    @if($aluno->ativo == true)
                                        @if($aluno->id == $turma_aluno->aluno_id)
                                            <option value="{{$aluno->id}}" selected>{{$aluno->nome}}</option>
                                        @else
                                            <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="turma_id">Turma <span class="text-danger">*</span></label>
                            <select class="form-control" id="turma_id" name="turma_id" required>
                                @foreach($turmas as $turma)
                                    @if($turma->ativo == true)
                                        @if($turma->id == $turma_aluno->turma_id)
                                            <option value="{{$turma->id}}" selected>{{$turma->nome}}/{{$turma->turno}}</option>
                                        @else
                                            <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" id="ativo" name="ativo">
                                @if($turma_aluno->ativo == true)
                                    <option value="1" selected>Sim</option>
                                    <option value="">Não</option>
                                @else
                                    <option value="" selected>Não</option>
                                    <option value="1">Sim</option>
                                @endif
                            </select>
                        </div>  
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Alterar</button>&nbsp&nbsp&nbsp
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