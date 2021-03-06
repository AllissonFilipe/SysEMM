@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Turma</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Turmas</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    @if(Auth::user()->tipo == "Coordenador")
        <div class="box">
            <div class="box-header">
                <h3>Fazer Cadastro</h3>
            </div>
            <div class="box-body">
                @include('admin.includes.alerts')

                <form method="POST" action="{{ route('turma.post') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-group col-md-3">
                            <label for="nome">Nome <span class="text-danger">*</span></label> 
                            <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="turno">Turno <span class="text-danger">*</span></label>
                            <select class="form-control" id="turno" name="turno" required>
                                <option selected disabled>Escolha uma opção</option>
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Integral">Integral</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="qtd_vagas">Quantidade de Vagas <span class="text-danger">*</span></label>
                            <input type="number" id="qtd_vagas" name="qtd_vagas" placeholder="Quantidade de Vagas" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ano_letivo">Ano Letivo <span class="text-danger">*</span></label>
                            <input class="form-control" id="ano_letivo" name="ano_letivo" type="number" placeholder="Quantidade de Vagas" required/>
                        </div>        
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Cadastrar</button>&nbsp&nbsp&nbsp
                        <a href="{{ route('admin.turma') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
            <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop