@extends('adminlte::page')

@section('title', 'Alocar Professor')

@section('content_header')

<h1>Alocações</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Alocações</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{route('alocarUser.create')}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-plus"></span> Adicionar</a><br><br>
    </div>
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <br />
                <h5><b>Total: {{$total}}</b></h5>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr style="background-color: #ffdab3;">
                                <th id="center">Código</th>
                                <th>Turma</th>
                                <th>Disciplina</th>
                                <th>Professor</th>
                                <th>Ações</th>
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
                                    <a href="{{route('alocarUser.edit', $alocar_user->id)}}" data-toggle="tooltip" data-placement="top" title="Alterar" class="btn btn-success">Editar</a>
                                    &nbsp;<form style="display: inline-block;" method="POST" action="{{route('alocarUser.delete', $alocar_user->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
                                        {{method_field('DELETE')}}{{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit" >
                                            Apagar
                                        </button></form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop