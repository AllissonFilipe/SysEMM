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
    @if(Auth::user()->tipo == "Coodenador")
        <div class="box">
            <div class="box-header">
                <a href="{{route('aluno.create')}}" class="btn btn-warning">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                <div style="float: right;" class="form-group input-group">
                    <form action="{{ route('admin.aluno') }}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Buscar Aluno"><span class="input-group-btn">
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
                                    <th>Data de Nascimento</th>
                                    <th>Sexo</th>
                                    <th>RG</th>
                                    <th>CPF</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
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
                                        <!-- Botão para acionar modal -->
                                        <button data-toggle="modal" data-target="#ModalCentralizado<?php echo ($aluno->id); ?>" class="btn btn-primary">
                                            Visualizar
                                        </button>&nbsp;
                                        <a href="{{route('aluno.edit', $aluno->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn btn-success">Editar</a>
                                        &nbsp;<form style="display: inline-block;" method="POST" action="{{route('aluno.delete', $aluno->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                            {{method_field('DELETE')}}{{ csrf_field() }}
                                            <button class="btn btn-danger" type="submit">
                                                Apagar
                                            </button></form>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="ModalCentralizado<?php echo ($aluno->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="TituloModalCentralizado">Aluno</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="text-center">
                                                    <b>Nome :</b> {{$aluno->nome}}<br>
                                                    <b>Data de Nascimento :</b> {{$aluno->data_de_nascimento}}<br>
                                                    <b>Sexo :</b> {{$aluno->sexo}}<br>
                                                    <b>RG :</b> {{$aluno->rg}}<br>
                                                    <b>CPF :</b> {{$aluno->cpf}}<br>
                                                    <b>Ativo :</b> @if($aluno->ativo == true) Sim<br> @else Não<br> @endif
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

                        {!! $alunos->links() !!}
                    </div>
                </div>
            </div>
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
            <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop