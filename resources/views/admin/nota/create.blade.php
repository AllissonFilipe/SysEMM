@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
<h1>Cadastrar Notas dos Alunos</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Notas</a></li>
    <li><a href="">Cadastrar</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Cadastrar Notas por Turma</h3>
        <br><br>
        <h4>Unidade: <b>{{$unidade}}</b></h4>
        @foreach($disciplinas as $disciplina)
            @if($disciplina->id == $disciplina_id)
                <h4>Disciplina: <b>{{$disciplina->nome}}</b></h4>
            @endif
        @endforeach
        <h4>Método de Avaliação: <b>{{$tipo}}</b></h4>
    </div>
    <div class="box-body">
        @include('admin.includes.alerts')

        <form method="POST" action="{{ route('notaTurma.post') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                @foreach($turma_alunos as $turma_aluno)
                <div class="form-group col-md-4">
                    <label for="turma_aluno_id">Aluno</label>
                   
                    @foreach($alunos as $aluno)
                    @if($aluno->id == $turma_aluno->aluno_id)
                    <input type="hidden" id="turma_aluno_id" name="turma_aluno_id[]" value="{{$turma_aluno->id}}">
                    <input type="text" name="nome" value="{{$aluno->nome}}" class="form-control" readonly>
                    @endif
                    @endforeach
                </div>

                <input type="hidden" id="turma_id" name="turma_id[]" value="{{$turma_id}}">
    
                <input type="hidden" id="disciplina_id" name="disciplina_id[]" value="{{$disciplina_id}}">
                    
                <input type="hidden" id="unidade" name="unidade[]" value="{{$unidade}}" class="form-control"/>
                   
                <input type="hidden" id="tipo" name="tipo[]" value="{{$tipo}}" class="form-control"/>

                <div class="form-group col-md-1">
                    <label for="nota">Nota</label>
                    <input type="number" step="0.01" id="nota" value="" name="nota[]" class="form-control" required />
                </div>
                @endforeach
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success">Cadastrar</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('admin.nota') }}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@stop