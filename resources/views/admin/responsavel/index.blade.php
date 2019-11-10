@extends('adminlte::page')

@section('title', 'Responsável')

@section('content_header')

<h1>Responsáveis</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Responsáveis</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('responsavel.create')}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
        <div style="float: right;" class="form-group input-group">
            <form action="{{ route('admin.responsavel') }}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Buscar Responsavel"><span class="input-group-btn">
                        <button type="submit" class="btn btn-warning">
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
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #ffdab3;">
                            <th id="center">Código</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Grau de Parentesco</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responsavels as $responsavel)
                        <tr>
                            <td id="center">{{$responsavel->id}}</td>
                            <td title="Nome">{{$responsavel->nome}}</td>
                            <td title="CPF">{{$responsavel->cpf}}</td>
                            <td title="Telefone">{{$responsavel->telefone}}</td>
                            <td title="Grau de Parentesco">{{$responsavel->grau_de_parentesco}}</td>
                            @if($responsavel->ativo == true)
                            <td title="Ativo">Sim</td>
                            @else
                            <td title="Inativo">Não</td>
                            @endif
                            <td id="center">
                                <!-- Botão para acionar modal -->
                                <button data-toggle="modal" data-target="#ModalCentralizado<?php echo ($responsavel->id); ?>" class="btn btn-primary">
                                    Visualizar
                                </button>&nbsp;
                                <a href="{{route('responsavel.edit', $responsavel->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn btn-success">Editar</a>
                                &nbsp;<form style="display: inline-block;" method="POST" action="{{route('responsavel.delete', $responsavel->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                    {{method_field('DELETE')}}{{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">
                                        Apagar
                                    </button></form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCentralizado<?php echo ($responsavel->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TituloModalCentralizado">Responsável</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="text-center">
                                            <b>Nome :</b> {{$responsavel->nome}}<br>
                                            <b>CPF :</b> {{$responsavel->cpf}}<br>
                                            <b>Telefone :</b> {{$responsavel->telefone}}<br>
                                            <b>Grau de Parentesco :</b> {{$responsavel->grau_de_parentesco}}<br>
                                            <b>CEP :</b> {{$responsavel->cep}}<br>
                                            <b>Número :</b> {{$responsavel->numero}}<br>
                                            <b>Logradouro :</b> {{$responsavel->logradouro}}<br>
                                            <b>Complemento :</b> {{$responsavel->complemento}}<br>
                                            <b>Bairro :</b> {{$responsavel->bairro}}<br>
                                            <b>Cidade :</b> {{$responsavel->cidade}}<br>
                                            <b>UF :</b> {{$responsavel->uf}}<br>
                                            <b>Ativo :</b> @if($responsavel->ativo == true) Sim<br> @else Não<br> @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>

                {!! $responsavels->links() !!}
            </div>
        </div>
    </div>
    @stop