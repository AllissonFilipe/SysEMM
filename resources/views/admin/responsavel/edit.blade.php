@extends('adminlte::page')

@section('title', 'Editar Cadastro')

@section('content_header')
    <h1>Editar Responsável</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Responsáveis</a></li>
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

                <form method="POST" action="{{ route('responsavel.put', $responsavel->id) }}" enctype="multipart/form-data" onsubmit="return confirm('Confirma a alteração ?')">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <fieldset class="form-group">
                        <legend>Informações Pessoais</legend> 
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label> 
                            <input type="text" id="nome" value="{{$responsavel->nome}}" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" value="{{$responsavel->cpf}}" name="cpf" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input class="form-control" id="telefone" type="text" value="{{$responsavel->telefone}}" name="telefone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="grau_de_parentesco">Grau de Parentesco</label>
                            <input class="form-control" id="grau_de_parentesco" type="text" value="{{$responsavel->grau_de_parentesco}}" name="grau_de_parentesco" required/>
                        </div>  
                        <div class="form-group col-md-6">
                            <label for="senha">Senha para acesso ao sistema</label>
                            <input type="password" id="senha" name="senha" value="{{$responsavel->senha}}" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirm">Confirmar a Senha</label>
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmar a Senha" class="form-control" required/>
                        </div>  
                        <div class="form-group col-md-2">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" id="ativo" name="ativo">
                                @if($responsavel->ativo == true)
                                    <option value="1" selected>Sim</option>
                                    <option value="">Não</option>
                                @else
                                    <option value="" selected>Não</option>
                                    <option value="1">Sim</option>
                                @endif
                            </select>
                        </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <legend>Endereço</legend> 
                            <div class="row">
                                <div style="margin-left:15px;" class="form-group col-md-2">
                                    <label for="cep">CEP</label>
                                    <input class="form-control" id="cep" type="text" value="{{$responsavel->cep}}" name="cep" required/>
                                </div> 
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="logradouro">Logradouro</label>
                                <input class="form-control" id="logradouro" type="text" value="{{$responsavel->logradouro}}" name="logradouro" required/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numero">Número</label>
                                <input class="form-control" id="numero" type="number" value="{{$responsavel->numero}}" name="numero"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="complemento">Complemento</label>
                                <input class="form-control" id="complemento" type="text" value="{{$responsavel->complemento}}" name="complemento"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input class="form-control" id="bairro" type="text" value="{{$responsavel->bairro}}" name="bairro" required/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input class="form-control" id="cidade" type="text" value="{{$responsavel->cidade}}" name="cidade" required/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="uf">Estado</label>
                                <select class="form-control" id="uf" name="uf" required>
                                    <option value="{{$responsavel->uf}}" selected>{{$responsavel->uf}}</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div> 
                        </fieldset>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success">Alterar</button>&nbsp&nbsp&nbsp
                        <a href="{{ route('admin.responsavel') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://unpkg.com/imask"></script>
        <script type="text/javascript">
        $("#cep").focusout(function(){
            //Início do Comando AJAX
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function(resposta){
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#logradouro").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    $("#numero").focus();
                    }
                });
            });

            var elemento_cpf = document.getElementById('cpf');
            var maskOptions_cpf = {
                mask: '000.000.000-00'
            };
            var mascara_cpf = new IMask(elemento_cpf, maskOptions_cpf);
            
            $("form").submit(function(){
                $("#cpf").val(mascara_cpf.unmaskedValue);
            });

            var elemento_telefone = document.getElementById('telefone');
            var maskOptions_telefone = {
                mask: '0000-00000'
            };
            var mascara_telefone = new IMask(elemento_telefone, maskOptions_telefone);
            
            $("form").submit(function(){
                $("#telefone").val(mascara_telefone.unmaskedValue);
            });

            var elemento_cep = document.getElementById('cep');
            var maskOptions_cep = {
                mask: '00000-000'
            };
            var mascara_cep = new IMask(elemento_cep, maskOptions_cep);
            
            $("form").submit(function(){
                $("#cep").val(mascara_cep.unmaskedValue);
            });
        </script>
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
             <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop