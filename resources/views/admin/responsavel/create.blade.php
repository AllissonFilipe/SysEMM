@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Responsável</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Responsável</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Cadastro</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="nome">Nome</label> 
                        <input type="text" id="nome" placeholder="Nome" class="form-control">
                    <label for="cpf">CPF</label>
                        <input type="text" id="cpf" placeholder="CPF" class="form-control">
                    <label for="telefone">Telefone</label>
		                <input class="form-control" id="telefone" type="number" placeholder="Telefone">
                    <label for="email">E-mail</label>
                        <input type="email" id="email" placeholder="E-mail" class="form-control">
                    <label for="senha">Senha</label>
                        <input type="password" id="senha" placeholder="Senha" class="form-control">
                    <label for="grau_de_parentesco">Grau de Parentesco</label>
                    <select class="form-control" id="grau_de_parentesco" >
                        <option value="mae">Mãe</option>
                        <option value="pai">Pai</option>
                        <option value="pai">Tia</option>
                        <option value="pai">Tio</option>
                        <option value="pai">Avó</option>
                        <option value="pai">Avô</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop