@extends('adminlte::page')

@section('title', 'Alocar Professor')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
    <h1>Alocações</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alocações</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('alocarUser.create')}}" 
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
                        <h4 style="text-align:center;"><b>ALOCAÇÕES REALIZADAS ({{$total}})</b></h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr class="warning">
                                        <th id="center">Código</th>
                                        <th>Turma</th>
                                        <th>Disciplina</th>
                                        <th>Professor</th> 
                                        <th></th>                           
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alocar_users as $alocar_user)
                                    <tr>
                                        <td id="center">{{$alocar_user->id}}</td>
                                        @foreach($turmas as $turma)
                                            @if($alocar_user->turma_id == $turma->id)
                                                <td title="Turma">{{$turma->nome}}/{{$turma->turno}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($disciplinas as $disciplina)
                                            @if($alocar_user->disciplina_id == $disciplina->id)
                                                <td title="Disciplina">{{$disciplina->nome}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($users as $user)
                                            @if($alocar_user->user_id == $user->id)
                                                <td title="Professor">{{$user->name}}</td>
                                            @endif
                                        @endforeach
                                        <td id="center">
                                            <a href="{{route('alocarUser.edit', $alocar_user->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" 
                                        action="{{route('alocarUser.delete', $alocar_user->id)}}"                                                        
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

