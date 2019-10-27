@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
<h1>Editar Notas dos Alunos</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Notas</a></li>
    <li><a href="">Editar</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Editar Notas por Turma</h3>
    </div>
    <div class="box-body">
        @include('admin.includes.alerts')

        <form method="POST" action="{{ route('notaTurma.put') }}">
            {{ method_field('PUT') }}
            {!! csrf_field() !!}

            <div class="form-group">
                @foreach($notas as $nota)
                <input type="hidden" id="nota_id" name="nota_id[]" value="{{$nota->id}}">
                @foreach($turma_alunos as $turma_aluno)
                @if($turma_aluno->id == $nota->turma_aluno_id)
                <div class="form-group col-md-3">
                    <label for="turma_aluno_id">Aluno</label>

                    @foreach($alunos as $aluno)
                    @if($aluno->id == $turma_aluno->aluno_id)
                    <input type="hidden" id="turma_aluno_id" name="turma_aluno_id[]" value="{{$nota->turma_aluno_id}}">
                    <input type="text" name="nome" value="{{$aluno->nome}}" class="form-control" readonly>
                    @endif
                    @endforeach
                </div>
                @endif
                @endforeach
                <div class="form-group col-md-3">
                    <label for="disciplina_id">Disciplina</label>
                    @foreach($disciplinas as $disciplina)
                    @if($disciplina->id == $disciplina_id)
                    <input type="hidden" id="disciplina_id" name="disciplina_id[]" value="{{$nota->disciplina_id}}">
                    <input type="text" name="disciplina" value="{{$disciplina->nome}}" class="form-control" readonly>
                    @endif
                    @endforeach
                </div>
                <div class="form-group col-md-1">
                    <label for="unidade">Unidade</label>
                    <input type="number" id="unidade" name="unidade[]" value="{{$nota->unidade}}" class="form-control"
                        readonly />
                </div>
                <div class="form-group col-md-3">
                    <label for="tipo">Tipo</label>
                    <input type="text" id="tipo" name="tipo[]" value="{{$nota->tipo}}" class="form-control" readonly />
                </div>
                <div class="form-group col-md-2">
                    <label for="nota">Nota</label>
                    <input type="number" step="0.01" id="nota" value="{{$nota->nota}}" name="nota[]"
                        class="form-control" required />
                </div>
                @endforeach
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn_2">Alterar</button>&nbsp;&nbsp;&nbsp;
                <a href="{{ route('admin.nota') }}" class="btn_3">Cancelar</a>
            </div>
        </form>
        <form style="display: inline-block;" method="POST" action="{{route('notaTurma.delete')}}"
            data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
            {{method_field('DELETE')}}{{ csrf_field() }}
            @foreach($notas as $nota)
            <input type="hidden" id="nota_id" name="nota_id[]" value="{{$nota->id}}">
            @foreach($turma_alunos as $turma_aluno)
            @if($turma_aluno->id == $nota->turma_aluno_id)
            @foreach($alunos as $aluno)
            @if($aluno->id == $turma_aluno->aluno_id)
            <input type="hidden" id="turma_aluno_id" name="turma_aluno_id[]" value="{{$nota->turma_aluno_id}}">
            @endif
            @endforeach
            @endif
            @endforeach
            @foreach($disciplinas as $disciplina)
            @if($disciplina->id == $disciplina_id)
            <input type="hidden" id="disciplina_id" name="disciplina_id[]" value="{{$nota->disciplina_id}}">
            @endif
            @endforeach

            <input type="hidden" id="unidade" name="unidade[]" value="{{$nota->unidade}}" class="form-control" />
            <input type="hidden" id="tipo" name="tipo[]" value="{{$nota->tipo}}" class="form-control" />
            <input type="hidden" step="0.01" id="nota" value="{{$nota->nota}}" name="nota[]" class="form-control" />
            @endforeach
            <div class="form-group col-md-1">
                <button class="btn_4" type="submit" style="background-color: #fff">
                    Apagar
                </button>
            </div>
        </form>
    </div>
</div>
@stop