@extends('adminlte::page')

@section('title', 'Notificação do Colaborador')

@section('content_header')
    <h1>Notificação do Colaborador</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Notificação do Colaborador</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('notificacaoColab.create') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                 Cadastrar Notificação do Colaborador</a>
        </div>
    </div>
@stop