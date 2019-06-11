@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Nota do Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notas</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Cadastrar Nota</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('nota.post') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nota">Nota</label>
                    <input type="number" id="nota" name="nota" class="form-control" required/>
                    
                    <label for="tipo">Tipo</label>
		            <select class="form-control" id="tipo" name="tipo">
                        <option selected disabled>Escolha uma opção</option>
			            <option value="Prova">Prova</option>
                        <option value="Teste">Teste</option>
                        <option value="Trabalho">Trabalho</option>
		            </select>
                    <label for="unidade">Unidade</label>
                    <input type="number" id="unidade" name="unidade" class="form-control" required/>
                    <label for="data_nota">Data da Nota</label>
                    <input type="date" id="data_nota" name="data_nota" class="form-control"/>
                    <label for="turma_aluno_id">Aluno</label>
		            <select class="form-control" id="turma_aluno_id" name="turma_aluno_id">
                        <option selected disabled>Escolha uma opção</option>
                        @foreach($turma_alunos as $index => $turma_aluno)
                            @if($turma_aluno->aluno_id == $alunos[$index]->id)
			                    <option value="{{$turma_aluno->id}}">{{$alunos[$index]->nome}}</option>
                            @endif
                        @endforeach
		            </select>
                    <label for="disciplina_id">Disciplina</label>
		            <select class="form-control" id="disciplina_id" name="disciplina_id">
                        <option selected disabled>Escolha uma opção</option>
                        @foreach($disciplinas as $disciplina)
			                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                        @endforeach
		            </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop