@extends('adminlte::page')

@section('title', 'Matrícula')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
    <h1>Matrículas</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Matrículas</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('turmaAluno.create')}}" 
            class="btn btn-default btn-sm pull-left">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a><br><br>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
            </div>
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
                        <h4 style="text-align:center;"><b>MATRÍCULAS REALIZADAS ({{$total}})</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="center">Código</th>
                                        <th>Data da Matrícula</th>
                                        <th>Data do Cancelamento</th>
                                        <th>Aluno</th> 
                                        <th>Turma</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turma_alunos as $turma_aluno)
                                    <tr>
                                        <td id="center">{{$turma_aluno->id}}</td>
                                        <td title="Data da Matrícula">{{$turma_aluno->dt_matricula}}</td>
                                        <td title="Data de Cancelamento">{{$turma_aluno->dt_cancelamento}}</td>
                                        @foreach($alunos as $aluno)
                                            @if($aluno->id == $turma_aluno->aluno_id)
                                                <td title="Aluno">{{$aluno->nome}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($turmas as $turma)
                                            @if($turma->id == $turma_aluno->turma_id)
                                                <td title="Turma">{{$turma->nome}}</td>
                                            @endif
                                        @endforeach
                                        <td id="center">
                                            <a href="{{route('turmaAluno.edit', $turma_aluno->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" 
                                        action="{{route('turmaAluno.delete', $turma_aluno->id)}}"                                                        
                                        data-toggle="tooltip" data-placement="top"
                                        title="Excluir" 
                                        onsubmit="return confirm('Confirma exclusão?')">
                                {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                <button type="submit" style="background-color: #fff">
                                    <a><i class="fa fa-trash-o"></i></a>                                                    
                                </button></form></td>               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
@stop

