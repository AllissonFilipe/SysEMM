@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alunos</a></li>
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

                <form method="POST" action="{{ route('aluno.post') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome <span class="text-danger">*</span></label> 
                            <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="data_de_nascimento">Data de Nascimento <span class="text-danger">*</span></label>
                            <input type="date" id="data_de_nascimento" name="data_de_nascimento" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sexo">Sexo <span class="text-danger">*</span></label>
                            <select class="form-control" id="sexo" name="sexo" required>
                                    <option selected disabled>Escolha uma opção</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rg">RG</label>
                            <input type="text" id="rg" name="rg" placeholder="RG" class="form-control"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-control"/>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="responsavel">Responsavel:</label>
                                <select multiple name="responsavel[]" id="responsavel" class="form-control" required>
                                    <option selected disabled>Escolha uma opção</option>
                                    @if(!empty($responsaveis))
                                        @foreach($responsaveis as $responsavel)
                                            @if($responsavel->ativo == true)
                                                <option value="{{$responsavel->id}}">{{$responsavel->nome}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Cadastrar</button>&nbsp&nbsp&nbsp
                        <a href="{{ route('admin.aluno') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://unpkg.com/imask"></script>

        <script type="text/javascript">

            var elemento_cpf = document.getElementById('cpf');
            var maskOptions_cpf = {
                mask: '000.000.000-00'
            };
            var mascara_cpf = new IMask(elemento_cpf, maskOptions_cpf);
            
            $("form").submit(function(){
                $("#cpf").val(mascara_cpf.unmaskedValue);
            });

            var elemento_rg = document.getElementById('rg');
            var maskOptions_rg = {
                mask: '0000000'
            };
            var mascara_rg = new IMask(elemento_rg, maskOptions_rg);
            
            $("form").submit(function(){
                $("#rg").val(mascara_rg.unmaskedValue);
            });
        </script>
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
            <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop