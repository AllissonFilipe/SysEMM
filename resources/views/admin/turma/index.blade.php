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
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
            <div style="float: right;" class="form-group input-group">
                <form action="{{ route('admin.turma') }}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input  type="text" class="form-control" name="q"
                        placeholder="Buscar Turma"><span class="input-group-btn">
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
                                        <th>Turno</th>
                                        <th>Quantidade de Vagas</th> 
                                        <th>Ano Letivo</th> 
                                        <th>Ativo</th>
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
                                        @if($turma->ativo == true)
                                            <td title="Ativo">Sim</td>
                                        @else
                                            <td title="Inativo">Não</td>
                                        @endif  
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
    

    <script>
        $('input#txt_consulta').quicksearch('table#tabela tbody tr');
    </script>
@stop

