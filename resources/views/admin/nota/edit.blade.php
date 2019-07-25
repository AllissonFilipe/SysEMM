@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Nota do Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notas</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Editar Nota</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('nota.put', $nota->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group col-md-2">
                        <label for="nota">Nota</label>
                        <input type="number" id="nota" name="nota" value="{{$nota->nota}}" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            @if($nota->tipo == "Prova")
                                <option value="Prova" selected>Prova</option>
                                <option value="Teste">Teste</option>
                                <option value="Trabalho">Trabalho</option>
                            @elseif($nota->tipo == "Teste")
                                <option value="Prova">Prova</option>
                                <option value="Teste" selected>Teste</option>
                                <option value="Trabalho">Trabalho</option>
                            @else
                                <option value="Prova">Prova</option>
                                <option value="Teste">Teste</option>
                                <option value="Trabalho" selected>Trabalho</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="unidade">Unidade</label>
                        <input type="number" id="unidade" name="unidade" value="{{$nota->unidade}}" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="turma_aluno_id">Aluno</label>
                        <select class="form-control" id="turma_aluno_id" name="turma_aluno_id">
                            @foreach($turma_alunos as $turma_aluno)
                                @foreach($alunos as $aluno) 
                                    @if($turma_aluno->ativo == true)
                                        @if($turma_aluno->aluno_id == $aluno->id)  
                                            @foreach($turmas as $turma) 
                                                @if($turma_aluno->turma_id == $turma->id)
                                                    @if($turma_aluno->id == $nota->turma_aluno_id)
                                                        <option value="{{$turma_aluno->id}}" selected>{{$aluno->nome}} ({{$turma->nome}}/{{$turma->turno}})</option>
                                                    @else
                                                        <option value="{{$turma_aluno->id}}">{{$aluno->nome}} ({{$turma->nome}}/{{$turma->turno}})</option>
                                                    @endif
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
                                @if($nota->disciplina_id == $disciplina->id)
                                    <option value="{{$disciplina->id}}" selected>{{$disciplina->nome}}</option>
                                @else
                                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn_2">Alterar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.nota') }}" class="btn_3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop