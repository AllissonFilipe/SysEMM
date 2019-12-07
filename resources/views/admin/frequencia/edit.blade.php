@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Frequência dos Alunos</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Frequências</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Editar Frequências</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('frequencia.put') }}" enctype="multipart/form-data" onsubmit="return confirm('Confirma a alteração ?')">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}    
                <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr style="background-color: #ffdab3;">
                                    <th>Matrícula</th>
                                    <th>Aluno</th>
                                    <th>Frequência</th>                     
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($frequencias as $frequencia)
                                    <input type="hidden" value="{{$frequencia->id}}" id="frequencia_id" name="frequencia_id[]" class="form-control" required/>
                                    <input type="hidden" value="{{$frequencia->disciplina_id}}" id="disciplina_id" name="disciplina_id[]" class="form-control" required/>
                                    <input type="hidden" value="{{$frequencia->data_frequencia}}" id="data_frequencia" name="data_frequencia[]" class="form-control" required/>
                                    <input type="hidden" value="{{$frequencia->turma_id}}" id="turma_id" name="turma_id[]" class="form-control" required/>
                                    <tr>
                                        <td title="Matrícula">
                                            <h4>{{$frequencia->turma_aluno_id}}</h4>
                                            <input style="display:none;" type="number" value="{{$frequencia->turma_aluno_id}}" id="turma_aluno_id" name="turma_aluno_id[]" class="form-control" required/>
                                        </td>
                                        <td title="Aluno">
                                        @foreach($turma_alunos as $turma_aluno)
                                            @if($turma_aluno->id == $frequencia->turma_aluno_id)
                                                @foreach($alunos as $aluno)
                                                    @if($turma_aluno->aluno_id == $aluno->id)
                                                        <h4>{{$aluno->nome}}</h4>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        </td>
                                        @if($frequencia->ausencia == 1)
                                            <td title="Frequência" class="tdausencia">
                                                <input type="checkbox" id="ausencia" name="ausencia[]"  value="on" class="ausencia" checked> Presente
                                                <input type="hidden" id="ausenciaHidden" name="ausencia[]" value="off" class="ausenciaHidden">
                                            </td>
                                        @elseif($frequencia->ausencia == 0)
                                            <td title="Frequência" class="tdausencia">
                                                <input type="checkbox" id="ausencia" name="ausencia[]" value="on" class="ausencia"> Presente
                                                <input type="hidden" id="ausenciaHidden" name="ausencia[]" value="off" class="ausenciaHidden">
                                            </td>
                                        @endif
                                       
                            @endforeach
                            </tbody>
                        </table>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-success">Alterar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.frequencia') }}" class="btn btn-default">Cancelar</a>&nbsp&nbsp&nbsp
                </div>
            </form>                      
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".tdausencia").each(function() {
                $(".ausencia").each(function() {
                    if($(this).is(':checked')) {
                        $(this).next('input').prop("disabled",true);
                    }
                });
            });

            $(".tdausencia").each(function() {
                $("input").click(function() {
                    if($(this).is(':checked')) {
                        $(this).next('input').prop("disabled",true);
                    }else {
                        $(this).next('input').prop("disabled",false);
                    }
                });
            });               
        });
    </script>
@stop

    