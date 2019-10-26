@extends('adminlte::page')

@section('title', 'Notas do Aluno')

@section('content_header')

<h1>Notas do Aluno</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Notas do Aluno</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h4>Notas do Aluno</h4>
    </div>
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif
    <div class="box-body">
        <div>
            <br />
            <h5><b>Total: {{$total}}</b></h5>
            <br>
            @foreach($notas as $nota)
            <form method="POST" action="{{route('nota.put', $nota->id)}}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <input type="hidden" name="disciplina_id" value="{{$nota->disciplina_id}}">
                <input type="hidden" name="turma_aluno_id" value="{{$nota->turma_aluno_id}}">
                <div clas="form-group">

                    @foreach($disciplinas as $disciplina)
                    @if($disciplina->id == $nota->disciplina_id)
                    <div class="form-group col-md-3">
                        <label for="disciplina">Disciplina</label>
                        <input class="form-control col-md-3" type="text" name="disciplina" value="{{$disciplina->nome}}"
                            readOnly>
                    </div>

                    @endif
                    @endforeach

                    <div class="form-group col-md-3">
                        <label for="unidade">Unidade</label>
                        <input class="form-control col-md-3" name="unidade" type="number" value="{{$nota->unidade}}"
                            readOnly>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="tipo">Tipo</label>
                        <input class="form-control col-md-3" name="tipo" type="text" value="{{$nota->tipo}}" readOnly>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nota">Nota</label>
                        <input class="form-control col-md-3" name="nota" type="number" step="0.01"
                            value="{{$nota->nota}}">
                    </div>

                    <div class="form-group col-md-1">
                        <button type="submit" class="btn_2">Alterar</button>
                    </div>


                </div>

            </form>
            <form style="display: inline-block;" method="POST" action="{{route('nota.delete', $nota->id)}}"
                data-toggle="tooltip" data-placement="top" title="Excluir"
                onsubmit="return confirm('Confirma exclusão?')">
                {{method_field('DELETE')}}{{ csrf_field() }}
                <div class="form-group col-md-1">
                    <button class="btn_4" type="submit" style="background-color: #fff">
                        Apagar
                    </button>
                </div>
            </form>


            @endforeach
        </div>
    </div>
</div>
@stop