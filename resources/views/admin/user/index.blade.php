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
            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                 Cadastrar Usuário</a>
        </div>
    </div>
@stop