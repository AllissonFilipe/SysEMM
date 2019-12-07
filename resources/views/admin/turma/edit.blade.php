@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Turma</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Turmas</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop

@section('content')
    @if(Auth::user()->tipo == "Coordenador")
        <div class="box">
            <div class="box-header">
                <h3>Fazer Edição</h3>
            </div>
            <div class="box-body">
                @include('admin.includes.alerts')

                <form method="POST" action="{{ route('turma.put', $turma->id) }}" onsubmit="return confirm('Confirma a alteração ?')">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label> 
                            <input type="text" id="nome" name="nome" value="{{$turma->nome}}" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="turno">Turno</label>
                            <select class="form-control" id="turno" name="turno" required>
                                <option value="{{$turma->turno}}" selected>{{$turma->turno}}</option>
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Integral">Integral</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qtd_vagas">Quantidade de Vagas</label>
                            <input type="number" id="qtd_vagas" name="qtd_vagas" value="{{$turma->qtd_vagas }}" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ano_letivo">Ano Letivo</label>
                            <input class="form-control" id="ano_letivo" name="ano_letivo" type="number" value="{{$turma->ano_letivo}}" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" id="ativo" name="ativo">
                                @if($turma->ativo == true)
                                    <option value="1" selected>Sim</option>
                                    <option value="">Não</option>
                                @else
                                    <option value="" selected>Não</option>
                                    <option value="1">Sim</option>
                                @endif
                            </select>
                        </div>   
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Alterar</button>&nbsp&nbsp&nbsp
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