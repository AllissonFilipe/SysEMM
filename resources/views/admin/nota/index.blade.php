@extends('adminlte::page')

@section('title', 'Nota')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
    <h1>Notas</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notas</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('nota.create')}}" 
            class="btn_1">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a><br><br>
            <form method="POST" action="{{ route('admin.nota') }}">
                {!! csrf_field() !!}
                <div class="form-group">   
                    <div class="form-group col-md-6">
                        <label for="turma_aluno_id">Aluno</label>
                        <select class="form-control" id="turma_aluno_id" name="turma_aluno_id">
                                <option selected disabled>Escolha uma opção</option>
                                @foreach($turma_alunos as $turma_aluno)
                                    @foreach($alunos as $aluno)
                                        @if($turma_aluno->aluno_id == $aluno->id)
                                            @foreach($turmas as $turma)
                                                @if($turma_aluno->turma_id == $turma->id)
                                                    <option value="{{$turma_aluno->id}}">{{$aluno->nome}} - ({{$turma->nome}}/{{$turma->turno}})</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn_1">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" 
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
        @endif 
            <div class="box-body">
                <div class="row">
                    <div class="box-body">   
                        <br />
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr style="background-color: #ffdab3;">
                                        <th id="center">Código</th>
                                        <th>Nota</th>
                                        <th>Tipo</th>
                                        <th>Unidade</th> 
                                        <th>Data da Nota</th>  
                                        <th>Disciplina</th>  
                                        <th>Aluno</th>
                                        <th></th>                      
                                    </tr>
                                </thead>
                        <tbody>
                            @foreach($notas as $nota)
                                @if($turma_aluno_id == $nota->turma_aluno_id)
                                        <tr>
                                                <td id="center">{{$nota->id}}</td>
                                                <td title="Nota">{{$nota->nota}}</td>
                                                <td title="Tipo">{{$nota->tipo}}</td>
                                                <td title="Unidade">{{$nota->unidade}}</td>
                                                <td title="Data da Nota">{{$nota->data_nota}}</td>
                                                @foreach($disciplinas as $disciplina)
                                                    @if($disciplina->id == $nota->disciplina_id)
                                                        <td title="Disciplina">{{$disciplina->nome}}</td>
                                                    @endif
                                                @endforeach
                                                @foreach($turma_alunos as $turma_aluno)
                                                    @if($turma_aluno->id == $nota->turma_aluno_id)
                                                        @foreach($alunos as $aluno)
                                                            @if($turma_aluno->aluno_id == $aluno->id)
                                                                <td title="Aluno">{{$aluno->nome}}</td>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <td id="center">
                                                    <a href="{{route('nota.edit', $nota->id)}}" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top"
                                                    title="Alterar"><i class="fa fa-pencil"></i></a>
                                        &nbsp;<form style="display: inline-block;" method="POST" 
                                                action="{{route('nota.delete', $nota->id)}}"                                                        
                                                data-toggle="tooltip" data-placement="top"
                                                title="Excluir" 
                                                onsubmit="return confirm('Confirma exclusão?')">
                                        {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                        <button type="submit" style="background-color: #fff">
                                            <a><i class="fa fa-trash-o"></i></a>                                                    
                                        </button></form></td>               
                                    </tr>
                                @endif
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
    
