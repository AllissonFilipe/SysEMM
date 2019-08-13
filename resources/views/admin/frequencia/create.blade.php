@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Frequência dos Alunos</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Frequências</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Cadastrar Frequências</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('frequencia.post') }}">
                {!! csrf_field() !!}    
                <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr style="background-color: #ffdab3;">
                                    <th>Matrícula</th>
                                    <th>Aluno</th>
                                    <th>Frequência</th>                     
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($turma_alunos as $turma_aluno)
                                @if($turma_aluno->ativo == true)
                                    <input type="hidden" value="{{$disciplina}}" id="disciplina_id" name="disciplina_id[]" class="form-control" required/>
                                    <input type="hidden" value="{{$data}}" id="data_frequencia" name="data_frequencia[]" class="form-control" required/>
                                    <tr>
                                        <td title="Matrícula">
                                            <h4>{{$turma_aluno->id}}</h4>
                                            <input style="display:none;" type="number" value="{{$turma_aluno->id}}" id="turma_aluno_id" name="turma_aluno_id[]" class="form-control" required/>
                                        </td>
                                        <td title="Aluno">
                                            @foreach($alunos as $aluno)
                                                @if($turma_aluno->aluno_id == $aluno->id)
                                                    <h4>{{$aluno->nome}}</h4>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td title="Frequência">
                                            <input type="checkbox" id="presenca" name="presenca[]"> Presente
                                        </td>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn_2">Cadastrar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.nota') }}" class="btn_3">Cancelar</a>
                </div>
            </form>                      
        </div>
    </div>
@stop

    