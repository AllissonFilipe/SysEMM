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
            class="btn_1">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
            <div style="float: right;" class="form-group input-group">
                <form action="{{ route('admin.turmaAluno') }}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input  type="text" class="form-control" name="q"
                        placeholder="Buscar Matrícula"><span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                         <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                     </div>
                </form>
            </div>
            <br><br>
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
                    <div>   
                        <br />
                        <h5><b>Total: {{$total}}</b></h5>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr style="background-color: #ffdab3;">
                                        <th id="center">Código</th>
                                        <th>Data da Matrícula</th>
                                        <th>Data do Cancelamento</th>
                                        <th>Aluno</th> 
                                        <th>Turma</th> 
                                        <th>Ativo</th>
                                        <th></th>                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turma_alunos as $turma_aluno)
                                    <tr>
                                        <td id="center">{{$turma_aluno->id}}</td>
                                        <td title="Data da Matrícula">{{$turma_aluno->created_at}}</td>
                                        <td title="Data de Cancelamento">{{$turma_aluno->dt_cancelamento}}</td>
                                        @foreach($alunos as $aluno)
                                            @if($aluno->id == $turma_aluno->aluno_id)
                                                <td title="Aluno">{{$aluno->nome}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($turmas as $turma)
                                            @if($turma->id == $turma_aluno->turma_id)
                                                <td title="Turma">{{$turma->nome}}/{{$turma->turno}}</td>
                                            @endif
                                        @endforeach
                                        @if($turma_aluno->ativo == true)
                                            <td title="Ativo">Sim</td>
                                        @else
                                            <td title="Inativo">Não</td>
                                        @endif
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
    

    <script>
        $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
@stop

