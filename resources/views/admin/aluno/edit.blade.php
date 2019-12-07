@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Aluno</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Alunos</a></li>
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

                <form action="{{ route('aluno.put', $aluno->id) }}" method="POST"  enctype="multipart/form-data" onsubmit="return confirm('Confirma a alteração ?')">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome</label> 
                            <input type="text" id="nome" name="nome" value="{{$aluno->nome}}" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="data_de_nascimento">Data de Nascimento</label>
                            <input type="date" id="data_de_nascimento" class="form-control" name="data_de_nascimento" value="{{$aluno->data_de_nascimento}}" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="sexo" required>
                                    <option value="{{$aluno->sexo}}" selected>{{$aluno->sexo}}</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="rg">RG</label>
                            <input type="text" id="rg" name="rg" value="{{$aluno->rg}}" class="form-control"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="{{$aluno->cpf}}" class="form-control"/>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="responsavel">Responsavel:</label>
                                <select multiple name="responsavel[]" id="responsavel" class="form-control" required>
                                    @if(!empty($responsaveis))
                                        @foreach($responsaveis as $responsavel)
                                            @if($responsavel->ativo == true)
                                                @if(in_array($responsavel->id,$aluno->responsavelArray()))
                                                    <option value="{{$responsavel->id}}" selected>{{$responsavel->nome}}</option>
                                                @else
                                                    <option value="{{$responsavel->id}}">{{$responsavel->nome}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div style="margin-left: 15px;" class="form-group col-md-2">
                                <label for="ativo">Ativo</label>
                                <select class="form-control" id="ativo" name="ativo">
                                    @if($aluno->ativo == true)
                                        <option value="1" selected>Sim</option>
                                        <option value="">Não</option>
                                    @else
                                        <option value="" selected>Não</option>
                                        <option value="1">Sim</option>
                                    @endif
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success">Alterar</button>&nbsp&nbsp&nbsp
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