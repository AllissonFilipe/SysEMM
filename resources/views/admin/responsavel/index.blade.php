@extends('adminlte::page')

@section('title', 'Responsável')

@section('content_header')
    <h1>Responsável</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Responsável</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('responsavel.create') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                 Cadastrar Responsável</a>
        </div>
    </div>
@stop