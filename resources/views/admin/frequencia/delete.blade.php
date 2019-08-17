@extends('adminlte::page')

@section('title', 'Deletar Cadastro')

@section('content_header')
    <h1>Deletar Frequência dos Alunos</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Frequências</a></li>
        <li><a href="">Deletar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Deletar Frequências</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('frequencia.delete') }}" enctype="multipart/form-data">
                {{method_field('DELETE')}}
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
                                        @if($frequencia->presenca == 1)
                                            <td title="Frequência" class="tdPresenca">
                                                <input type="checkbox" id="presenca" name="presenca[]"  value="on" class="presenca" onclick="return false;" checked> Presente
                                                <input type="hidden" id="presencaHidden" name="presenca[]" value="off" class="presencaHidden">
                                            </td>
                                        @elseif($frequencia->presenca == 0)
                                            <td title="Frequência" class="tdPresenca">
                                                <input type="checkbox" id="presenca" name="presenca[]" value="on" class="presenca" onclick="return false;"> Presente
                                                <input type="hidden" id="presencaHidden" name="presenca[]" value="off" class="presencaHidden">
                                            </td>
                                        @endif
                                       
                            @endforeach
                            </tbody>
                        </table>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn_4">Excluir</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.frequencia') }}" class="btn_3">Cancelar</a>&nbsp&nbsp&nbsp
                </div>
            </form>                      
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".tdPresenca").each(function() {
                $(".presenca").each(function() {
                    if($(this).is(':checked')) {
                        $(this).next('input').prop("disabled",true);
                    }
                });
            });            
        });
    </script>
@stop

    