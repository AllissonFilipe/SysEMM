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
                    <div class="form-group col-md-6">
                        <label for="nota">Nota</label>
                        <input type="number" id="nota" name="nota" value="{{$nota->nota or old('nota')}}" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
                        <label for="unidade">Unidade</label>
                        <input type="number" id="unidade" name="unidade" value="{{$nota->unidade or old('unidade')}}" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="data_nota">Data da Nota</label>
                        <input type="date" id="data_nota" name="data_nota" value="{{$nota->data_nota or old('data_nota')}}" class="form-control"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="turma_aluno_id">Aluno</label>
                        <select class="form-control" id="turma_aluno_id" name="turma_aluno_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turma_alunos as $index => $turma_aluno)
                                @if($turma_aluno->aluno_id == $alunos[$index]->id)
                                    @if($nota->turma_aluno_id or old('turma_aluno_id') == $turma_aluno->id)
                                        <option value="{{$turma_aluno->id}}" selected>{{$alunos[$index]->nome}}</option>
                                    @else
                                        <option value="{{$turma_aluno->id}}">{{$alunos[$index]->nome}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="disciplina_id">Disciplina</label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($disciplinas as $disciplina)
                                @if($nota->disciplina_id or old('disciplina_id') == $disciplina->id)
                                    <option value="{{$disciplina->id}}" selected>{{$disciplina->nome}}</option>
                                @else
                                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
@stop