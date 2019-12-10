@extends('adminlte::page')

@section('title', 'Avisos')

@section('content_header')

<h1>Avisos</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Avisos</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('notificacaoColab.create')}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
        <div style="float: right;" class="form-group input-group">
            <form action="{{ route('admin.notificacaoColab') }}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Buscar Notificação"><span class="input-group-btn">
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
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notificacao_colabs as $notificacao_colab)
                        <tr>
                            <td id="center">{{$notificacao_colab->id}}</td>
                            <td title="Nome">{{$notificacao_colab->titulo}}</td>
                            <td title="Descrição" class="w-10">{{$notificacao_colab->descricao}}</td>
                            <td title="Descrição">{{$notificacao_colab->categoria}}</td>
                            <td id="center">
                                <!-- Botão para acionar modal -->
                                <button data-toggle="modal" data-target="#ModalCentralizado<?php echo ($notificacao_colab->id); ?>" class="btn btn-primary">
                                    Visualizar
                                </button>&nbsp;
                                <a href="{{route('notificacaoColab.edit', $notificacao_colab->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn btn-success">Editar</a>
                                &nbsp;<form style="display: inline-block;" method="POST" action="{{route('notificacaoColab.delete', $notificacao_colab->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma a exclusão ?')">
                                    {{method_field('DELETE')}}{{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit" >
                                        Apagar
                                    </button></form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCentralizado<?php echo ($notificacao_colab->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TituloModalCentralizado">Notificação de Colaborador</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="text-center">
                                            <b>Título :</b> {{$notificacao_colab->titulo}}<br>
                                            <b>Descrição :</b> {{$notificacao_colab->descricao}}<br>
                                            <b>Tipo :</b> {{$notificacao_colab->tipo}}<br>
                                            <b>Categoria :</b> {{$notificacao_colab->categoria}}<br>
                                            <b>Usuário :</b>

                                            @foreach($users as $user)
                                            @if($user->id == $notificacao_colab->user_id)
                                            {{$user->name}}<br>
                                            @endif
                                            @endforeach

                                            @if($notificacao_colab->aluno_id)
                                            <b>Aluno :</b>
                                            @foreach($alunos as $aluno)
                                            @if($aluno->id == $notificacao_colab->aluno_id)
                                            {{$aluno->nome}}<br>
                                            @endif
                                            @endforeach

                                            @endif

                                            @if($notificacao_colab->turma_id)
                                            <b>Turma :</b>

                                            @foreach($turmas as $turma)
                                            @if($turma->id == $notificacao_colab->turma_id)
                                            {{$turma->nome}}<br>
                                            @endif
                                            @endforeach

                                            @endif
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

                {!! $notificacao_colabs->links() !!}
            </div>
        </div>
    </div>
    @stop