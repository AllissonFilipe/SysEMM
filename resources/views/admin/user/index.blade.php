@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')

<h1>Usuários</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Usuários</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('user.create')}}" class="btn_1">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
        <div style="float: right;" class="form-group input-group">
            <form action="{{ route('admin.user') }}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Buscar Usuário"><span class="input-group-btn">
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
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif
    <div class="box-body">
        <div>
            <br />
            <h5><b>Total: {{$total}}</b></h5>
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #ffdab3;">
                            <th id="center">Código</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ativo</th>
                            <th>Ações</th>
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
                            @if($user->ativo == true)
                            <td title="Ativo">Sim</td>
                            @else
                            <td title="Inativo">Não</td>
                            @endif
                            <td id="center">
                                <!-- Botão para acionar modal -->
                                <button data-toggle="modal" data-target="#ModalCentralizado<?php echo ($user->id); ?>" class="btn_5">
                                    Visualizar
                                </button>&nbsp;
                                <a href="{{route('user.edit', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn_2">Editar</a>
                                &nbsp;<form style="display: inline-block;" method="POST" action="{{route('user.delete', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                    {{method_field('DELETE')}}{{ csrf_field() }}
                                    <button type="submit" class="btn_4">
                                        Apagar
                                    </button></form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalCentralizado<?php echo ($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TituloModalCentralizado">Usuário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="text-center">
                                            <b>Nome :</b> {{$user->name}}<br>
                                            <b>Email :</b> {{$user->email}}<br>
                                            <b>Tipo :</b> {{$user->tipo}}<br>
                                            <b>CPF :</b> {{$user->cpf}}<br>
                                            <b>Data de Nascimento :</b> {{$user->data_de_nascimento}}<br>
                                            <b>Telefone :</b> {{$user->telefone}}<br>
                                            <b>CEP :</b> {{$user->cep}}<br>
                                            <b>Número :</b> {{$user->numero}}<br>
                                            <b>Logradouro :</b> {{$user->logradouro}}<br>
                                            <b>Complemento :</b> {{$user->complemento}}<br>
                                            <b>Bairro :</b> {{$user->bairro}}<br>
                                            <b>Cidade :</b> {{$user->cidade}}<br>
                                            <b>UF :</b> {{$user->uf}}<br>
                                            <b>Ativo :</b> @if($user->ativo == true) Sim<br> @else Não<br> @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>

                {!! $users->links() !!}
            </div>
        </div>
    </div>


    @stop