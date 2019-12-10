@extends('adminlte::page')

@section('title', 'Frequência')

@section('content_header')
    <style>
        .fa-pencil, .fa-trash-o{
            color: #ff8c1a;
        }

        .fa-pencil:hover, .fa-trash-o:hover {
            color: #b35900;
        }
    </style>
    <h1>Frequências</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Frequências</a></li>
    </ol>
    <br><br>
    @include('admin.includes.alerts')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
    @endif
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <form method="GET" action="{{ route('admin.frequenciaPost') }}">
                {!! csrf_field() !!}
                <div class="form-group">   
                    <div class="form-group col-md-4">
                        <label for="turma_id">Turma <span class="text-danger">*</span></label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turmas as $turma)
                                <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="disciplina_id">Disciplina <span class="text-danger">*</span></label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($disciplinas as $disciplina)
                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="data_frequencia">Data da Frequência <span class="text-danger">*</span></label>
                        <input type="date" id="data_frequencia" name="data_frequencia" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-warning">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="box">
        <div class="box-header">
            <form method="GET" action="{{ route('admin.frequenciaPut') }}">
                {!! csrf_field() !!}
                <div class="form-group">   
                    <div class="form-group col-md-4">
                        <label for="turma_id">Turma <span class="text-danger">*</span></label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turmas as $turma)
                                <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="disciplina_id">Disciplina <span class="text-danger">*</span></label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($disciplinas as $disciplina)
                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="data_frequencia">Data da Frequência <span class="text-danger">*</span></label>
                        <input type="date" id="data_frequencia" name="data_frequencia" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-warning">Visualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="box">
        <div class="box-header">
            <form method="GET" action="{{ route('admin.frequenciaDelete') }}">
                {!! csrf_field() !!}
                <div class="form-group">   
                    <div class="form-group col-md-4">
                        <label for="turma_id">Turma <span class="text-danger">*</span></label>
                        <select class="form-control" id="turma_id" name="turma_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($turmas as $turma)
                                <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="disciplina_id">Disciplina <span class="text-danger">*</span></label>
                        <select class="form-control" id="disciplina_id" name="disciplina_id">
                            <option selected disabled>Escolha uma opção</option>
                            @foreach($disciplinas as $disciplina)
                                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="data_frequencia">Data da Frequência <span class="text-danger">*</span></label>
                        <input type="date" id="data_frequencia" name="data_frequencia" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-warning">Exluir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop