@extends('adminlte::page')

@section('title', 'Aluno')

@section('content_header')
    <h1>Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Aluno</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('aluno.create') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                 Cadastrar Aluno</a>
        </div>
    </div>
@stop