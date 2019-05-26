@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    <h1>Usuário</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Usuário</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{route('user.create')}}" 
                class="btn btn-default btn-sm pull-left">
                <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                <!-- <a href="" 
                    class="btn btn-default btn-sm pull-right">
                    <i class="fa fa-book"></i> Relatório</a> -->
            <form class="form-group" method="post" action="#">   
                <div class="col-sm-4">
                <input type="text" name="pesquisar" 
                    class="form-control input-sm pull-left" 
                    placeholder="Pesquisar por nome..." required> 
                <button class="btn btn-default btn-sm pull-right" id="color"> 
                <span class="glyphicon glyphicon-search"></span>
                </button>
                </form>
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
                        <center><h4><b>USUÁRIOS CADASTRADOS ({{$total}})</b></h4></center>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th id="center">Código</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Tipo</th> 
                                        <th>CPF</th>              
                                        <th>Telefone</th>                            
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td id="center">{{$user->id}}</td>
                                        <td title="Nome">{{$user->name}}</td>
                                        <td title="Email">{{$user->email}}</td>
                                        <td title="Tipo">{{$user->tipo}}</td>
                                        <td title="CPF">{{$user->cpf}}</td>  
                                        <td title="Telefone">{{$user->telefone}}</td> 
                                        <td id="center">
                                            <a href="{{route('user.edit', $user->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                &nbsp;<form style="display: inline-block;" method="POST" 
                                        action="{{route('user.delete', $user->id)}}"                                                        
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
@stop

