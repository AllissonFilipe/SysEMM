@extends('adminlte::page')

@section('title', 'Disciplina')

@section('content_header')
    <h1>Disciplina</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Disciplina</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('disciplina.create') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                 Cadastrar Disciplina</a>
        </div>
    </div>
@stop