@extends('adminlte::page')

@section('title', 'Aluno')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
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
            class="btn_1">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
            <div style="float: right;" class="form-group input-group">
                <form action="{{ route('admin.aluno') }}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input  type="text" class="form-control" name="q"
                        placeholder="Buscar Aluno"><span class="input-group-btn">
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
                                        <th>Nome</th>
                                        <th>Data de Nascimento</th>
                                        <th>Sexo</th> 
                                        <th>RG</th>              
                                        <th>CPF</th>
                                        <th>Ativo</th> 
                                        <th></th>                           
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
                                        @if($aluno->ativo == true)
                                            <td title="Ativo">Sim</td>
                                        @else
                                            <td title="Inativo">Não</td>
                                        @endif
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
    

    <script>
        $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
@stop

