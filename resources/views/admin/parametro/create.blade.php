@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Parâmetro</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Parâmetros</a></li>
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

            <form method="POST" action="{{ route('parametro.post') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="chave">Chave</label> 
                        <input type="text" id="chave" placeholder="Chave" name="chave" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                                <option selected disabled>Escolha uma opção</option>
                                <option value="Inteiro">Inteiro</option>
                                <option value="Decimal">Decimal</option>
                                <option value="Data">Data</option>
                                <option value="Lógico">Lógico</option>
                                <option value="Texto">Texto</option>
                        </select>
                    </div>
                    <div class="col-md-12" id="div_valor_inteiro">
                        <label for="valor_inteiro">Valor Inteiro</label> 
                        <input type="number" id="valor_inteiro" placeholder="Valor Inteiro" name="valor_inteiro" class="form-control">
                    </div>
                    <div class="col-md-12" id="div_valor_decimal">
                        <label for="valor_decimal">Valor Decimal</label> 
                        <input type="number" step="0.01" id="valor_decimal" placeholder="Valor Decimal" name="valor_decimal" class="form-control">
                    </div>
                    <div class="col-md-12" id="div_valor_data">
                        <label for="valor_data">Valor Data</label> 
                        <input type="date" id="valor_data" placeholder="Valor Data" name="valor_data" class="form-control">
                    </div>
                    <div class="col-md-12" id="div_valor_logico">
                        <label for="valor_logico">Valor Lógico</label>
                        <select class="form-control" id="valor_logico" name="valor_logico">
                                <option selected disabled>Escolha uma opção</option>
                                <option value="1">Verdadeiro</option>
                                <option value="">Falso</option>
                        </select>
                    </div>
                    <div class="col-md-12" id="div_valor_texto">
                        <label for="valor_texto">Valor Texto</label> 
                        <input type="text" id="valor_texto" placeholder="Valor Texto" name="valor_texto" class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-6 panel-body">
                    <button type="submit" class="btn_2">Cadastrar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.parametro') }}" class="btn_3">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var val = $("#tipo").val()
            if(val == null) {
                    $("#div_valor_inteiro").hide();
                    $("#div_valor_decimal").hide();
                    $("#div_valor_data").hide();
                    $("#div_valor_logico").hide();
                    $("#div_valor_texto").hide();
            }
            $("#tipo").change(function(){
                val = $(this).val();
                if(val == null) {
                    $("#div_valor_inteiro").hide();
                    $("#div_valor_decimal").hide();
                    $("#div_valor_data").hide();
                    $("#div_valor_logico").hide();
                    $("#div_valor_texto").hide();
                }else if(val == 'Inteiro') {
                    $("#div_valor_inteiro").show();
                    $("#div_valor_decimal").hide();
                    $("#div_valor_data").hide();
                    $("#div_valor_logico").hide();
                    $("#div_valor_texto").hide();
                }else if(val == 'Decimal') {
                    $("#div_valor_inteiro").hide();
                    $("#div_valor_decimal").show();
                    $("#div_valor_data").hide();
                    $("#div_valor_logico").hide();
                    $("#div_valor_texto").hide();
                }else if(val == 'Data') {
                    $("#div_valor_inteiro").hide();
                    $("#div_valor_decimal").hide();
                    $("#div_valor_data").show();
                    $("#div_valor_logico").hide();
                    $("#div_valor_texto").hide();
                }else if(val == 'Lógico') {
                    $("#div_valor_inteiro").hide();
                    $("#div_valor_decimal").hide();
                    $("#div_valor_data").hide();
                    $("#div_valor_logico").show();
                    $("#div_valor_texto").hide();
                }else if(val == 'Texto') {
                    $("#div_valor_inteiro").hide();
                    $("#div_valor_decimal").hide();
                    $("#div_valor_data").hide();
                    $("#div_valor_logico").hide();
                    $("#div_valor_texto").show();
                }
            });

            
        });
    </script>
@stop