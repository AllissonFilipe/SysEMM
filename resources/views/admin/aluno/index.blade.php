@extends('adminlte::page')

@section('title', 'Aluno')

@section('content_header')
    <h1>Alunos</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alunos</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('aluno.create')}}" 
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
                        <h4 style="text-align:center;"><b>ALUNOS CADASTRADOS ({{$total}})</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="center">Código</th>
                                        <th>Nome</th>
                                        <th>Data de Nascimento</th>
                                        <th>Sexo</th> 
                                        <th>RG</th>              
                                        <th>CPF</th>                            
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alunos as $aluno)
                                    <tr>
                                        <td id="center">{{$aluno->id}}</td>
                                        <td title="Nome">{{$aluno->nome}}</td>
                                        <td title="Data de Nascimento">{{$aluno->data_de_nascimento}}</td>
                                        <td title="Sexo">{{$aluno->sexo}}</td>
                                        <td title="RG">{{$aluno->rg}}</td>  
                                        <td title="CPF">{{$aluno->cpf}}</td> 
                                        <td id="center">
                                            <a href="{{route('aluno.edit', $aluno->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" 
                                        action="{{route('aluno.delete', $aluno->id)}}"                                                        
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

