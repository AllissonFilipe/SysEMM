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
                        <h4 style="text-align:center;"><b>NOTAS CADASTRADAS ({{$total}})</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="center">Código</th>
                                        <th>Nota</th>
                                        <th>Tipo</th>
                                        <th>Unidade</th> 
                                        <th>Data da Nota</th>  
                                        <th>Disciplina</th>  
                                        <th>Aluno</th>                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notas as $nota)
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
                                        @foreach($turma_alunos as $index => $turma_aluno)
                                            @if($turma_aluno->id == $nota->turma_aluno_id)
                                                @if($turma_aluno->aluno_id == $alunos[$index]->id)
                                                    <td title="Aluno">{{$alunos[$index]->nome}}</td>
                                                @endif
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

