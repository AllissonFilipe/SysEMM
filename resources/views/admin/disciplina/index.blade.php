@extends('adminlte::page')

@section('title', 'Disciplina')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
    <h1>Disciplinas</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Disciplinas</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('disciplina.create')}}" 
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
                        <h4 style="text-align:center;"><b>DISCIPLINAS CADASTRADAS ({{$total}})</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="center">Código</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>                           
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($disciplinas as $disciplina)
                                    <tr>
                                        <td id="center">{{$disciplina->id}}</td>
                                        <td title="Nome">{{$disciplina->nome}}</td>
                                        <td title="Descrição">{{$disciplina->descricao}}</td>
                                        <td id="center">
                                            <a href="{{route('disciplina.edit', $disciplina->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" 
                                        action="{{route('disciplina.delete', $disciplina->id)}}"                                                        
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

