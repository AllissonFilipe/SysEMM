@extends('adminlte::page')

@section('title', 'Turma')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
    <h1>Turmas</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Turmas</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('turma.create')}}" 
            class="btn_1">
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
                        <h4 style="text-align:center;"><b>TURMAS CADASTRADAS ({{$total}})</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr style="background-color: #ffdab3;">
                                        <th id="center">Código</th>
                                        <th>Nome</th>
                                        <th>Turno</th>
                                        <th>Quantidade de Vagas</th> 
                                        <th>Ano Letivo</th> 
                                        <th></th>                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turmas as $turma)
                                    <tr>
                                        <td id="center">{{$turma->id}}</td>
                                        <td title="Nome">{{$turma->nome}}</td>
                                        <td title="Data de Nascimento">{{$turma->turno}}</td>
                                        <td title="Sexo">{{$turma->qtd_vagas}}</td>
                                        <td title="RG">{{$turma->ano_letivo}}</td>  
                                        <td id="center">
                                            <a href="{{route('turma.edit', $turma->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" 
                                        action="{{route('turma.delete', $turma->id)}}"                                                        
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

