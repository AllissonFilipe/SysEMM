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
                    <div class="form-group col-md-2">
                        <label for="nota">Nota</label>
                        <input type="number" step="0.01" id="nota" name="nota" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option selected disabled>Escolha uma opção</option>
                            <option value="Prova">Prova</option>
                            <option value="Teste">Teste</option>
                            <option value="Trabalho">Trabalho</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="unidade">Unidade</label>
                        <input type="number" id="unidade" name="unidade" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="turma_aluno_id">Aluno</label>
                        <select class="form-control" id="turma_aluno_id" name="turma_aluno_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turma_alunos as $turma_aluno)
                                @foreach($alunos as $aluno) 
                                    @if($turma_aluno->ativo == true)
                                        @if($turma_aluno->aluno_id == $aluno->id)  
                                            @foreach($turmas as $turma) 
                                                @if($turma_aluno->turma_id == $turma->id)
                                                    <option value="{{$turma_aluno->id}}">{{$aluno->nome}} ({{$turma->nome}}/{{$turma->turno}})</option>
                                                @endif
                                            @endforeach
                                        @endif 
                                    @endif   
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="disciplina_id">Disciplina</label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($disciplinas as $disciplina)
                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn_2">Cadastrar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.nota') }}" class="btn_3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop