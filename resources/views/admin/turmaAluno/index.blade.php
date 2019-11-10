@extends('adminlte::page')

@section('title', 'Matrícula')

@section('content_header')

<h1>Matrículas</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Matrículas</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('turmaAluno.create')}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
        <div style="float: right;" class="form-group input-group">
            <form action="{{ route('admin.turmaAluno') }}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Buscar Matrícula"><span class="input-group-btn">
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
                            <th>Data da Matrícula</th>
                            <th>Aluno</th>
                            <th>Turma</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turma_alunos as $turma_aluno)
                        <tr>
                            <td id="center">{{$turma_aluno->id}}</td>
                            <td title="Data da Matrícula">{{$turma_aluno->created_at}}</td>
                            @foreach($alunos as $aluno)
                            @if($aluno->id == $turma_aluno->aluno_id)
                            <td title="Aluno">{{$aluno->nome}}</td>
                            @endif
                            @endforeach
                            @foreach($turmas as $turma)
                            @if($turma->id == $turma_aluno->turma_id)
                            <td title="Turma">{{$turma->nome}}/{{$turma->turno}}</td>
                            @endif
                            @endforeach
                            @if($turma_aluno->ativo == true)
                            <td title="Ativo">Sim</td>
                            @else
                            <td title="Inativo">Não</td>
                            @endif
                            <td id="center">
                                <!-- Botão para acionar modal -->
                                <button data-toggle="modal" data-target="#ModalCentralizado<?php echo ($turma_aluno->id); ?>" class="btn btn-primary">
                                    Visualizar
                                </button>&nbsp;
                                <a href="{{route('turmaAluno.edit', $turma_aluno->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn btn-success">Editar</a>
                                &nbsp;<form style="display: inline-block;" method="POST" action="{{route('turmaAluno.delete', $turma_aluno->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                    {{method_field('DELETE')}}{{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit" >
                                        Apagar
                                    </button></form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCentralizado<?php echo ($turma_aluno->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TituloModalCentralizado">Matrícula</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="text-center">
                                            <b>Data da Matrícula : </b> {{$turma_aluno->created_at}}<br>

                                            <b>Aluno :</b>
                                            @foreach($alunos as $aluno)
                                            @if($aluno->id == $turma_aluno->aluno_id)
                                            {{$aluno->nome}}<br>
                                            @endif
                                            @endforeach

                                            <b>Turma :</b>
                                            @foreach($turmas as $turma)
                                            @if($turma->id == $turma_aluno->turma_id)
                                            {{$turma->nome}}/{{$turma->turno}}<br>
                                            @endif
                                            @endforeach

                                            <b>Ativo :</b> @if($turma_aluno->ativo == true) Sim<br> @else Não<br> @endif

                                            <b>Data do Cancelamento :</b> {{$turma_aluno->dt_cancelamento}}<br>
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

                {!! $turma_alunos->links() !!}
            </div>
        </div>
    </div>
    @stop