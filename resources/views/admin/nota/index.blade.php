@extends('adminlte::page')

@section('title', 'Nota')

@section('content_header')
<h1>Notas</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Notas</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Adicionar Notas</h3>
    </div>
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif
    <div class="box-body">
        <div class="col-md-6">
            <div class="input-group col-md-12">
                <span class="input-group-addon">
                    <input type="checkbox" id="checkboxTurma" value="turma" name="fooby[1][]">
                </span>
                <input type="text" class="form-control" value="Turma" readonly>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-6">
            <div class="input-group col-md-12">
                <span class="input-group-addon">
                    <input type="checkbox" id="checkboxAluno" value="aluno" name="fooby[1][]">
                </span>
                <input type="text" class="form-control" value="Aluno" readonly>
            </div><!-- /input-group -->
        </div>
        <form id="formTurma" method="GET" action="{{ route('nota.create') }}">
            <div class="form-group col-md-3">
                <label for="turma_id">Turma</label>
                <select name="turma_id" id="turma_id" class="form-control">
                    <option selected disabled>Escolha uma opção</option>
                    @foreach($turmas as $turma)
                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="disciplina_id">Disciplina</label>
                <select name="disciplina_id" id="disciplina_id" class="form-control">
                    <option selected disabled>Escolha uma opção</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="unidade">Unidade</label>
                <input type="number" id="unidade" name="unidade" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo">
                    <option selected disabled>Escolha uma opção</option>
                    <option value="Prova">Prova</option>
                    <option value="Teste">Teste</option>
                    <option value="Trabalho">Trabalho</option>
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn_2">Cadastrar</button>&nbsp;&nbsp;
            </div>
        </form>
        <form id="formAluno" method="POST" action="{{ route('nota.post') }}">
            {!! csrf_field() !!}
            <div class="form-group col-md-3">
                <label for="turma_aluno_id">Matrícula</label>
                <input type="number" id="turma_aluno_id" name="turma_aluno_id" class="form-control" required>
            </div>
            <div class="form-group col-md-3">
                <label for="disciplina_id">Disciplina</label>
                <select name="disciplina_id" id="disciplina_id" class="form-control" required>
                    <option selected disabled>Escolha uma opção</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" name="disciplina_id">{{$disciplina->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="unidade">Unidade</label>
                <input type="number" id="unidade" name="unidade" class="form-control" required>
            </div>
            <div class="form-group col-md-2">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option selected disabled>Escolha uma opção</option>
                    <option value="Prova">Prova</option>
                    <option value="Teste">Teste</option>
                    <option value="Trabalho">Trabalho</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="nota">Nota</label>
                <input type="number" step="0.01" id="nota" name="nota" class="form-control" required />
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn_2">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3>Exibição de Notas</h3>
    </div>
    <div class="box-body">
        <form id="formTurmaEdit" method="GET" action="{{ route('nota.edit') }}">
            <div class="form-group col-md-3">
                <label for="turma_id">Turma</label>
                <select name="turma_id" id="turma_id" class="form-control">
                    <option selected disabled>Escolha uma opção</option>
                    @foreach($turmas as $turma)
                    <option value="{{$turma->id}}">{{$turma->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="disciplina_id">Disciplina</label>
                <select name="disciplina_id" id="disciplina_id" class="form-control">
                    <option selected disabled>Escolha uma opção</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="unidade">Unidade</label>
                <input type="number" id="unidade" name="unidade" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo">
                    <option selected disabled>Escolha uma opção</option>
                    <option value="Prova">Prova</option>
                    <option value="Teste">Teste</option>
                    <option value="Trabalho">Trabalho</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" formaction="{{ route('nota.edit') }}"
                    class="btn_2">Buscar</button>
            </div>
        </form>
        <form id="formAlunoEdit" method="GET" action="{{ route('nota.list') }}">
            <div class="form-group col-md-4">
                <label for="turma_aluno_id">Matrícula</label>
                <input type="number" id="turma_aluno_id" name="turma_aluno_id" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="disciplina_id">Disciplina</label>
                <select name="disciplina_id" id="disciplina_id" class="form-control" required>
                    <option selected disabled>Escolha uma opção</option>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" name="disciplina_id">{{$disciplina->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn_2">Buscar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#formTurma").hide();
    $("#formAluno").hide();

    // the selector will match all input controls of type :checkbox
    // and attach a click event handler 
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            if ($(this).val() == "turma") {
                $("#formTurma").show();
                $("#formAluno").hide();
            } else if ($(this).val() == "aluno") {
                $("#formTurma").hide();
                $("#formAluno").show();
            }

            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
            $("#formTurma").hide();
            $("#formAluno").hide();
        }
    });
});
</script>
@stop