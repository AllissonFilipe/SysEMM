@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Usuário</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Usuários</a></li>
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

            <form method="POST" action="{{ route('user.post') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <fieldset class="form-froup">
                        <legend>Informações Pessoais</legend>
                        <div class="col-md-6">
                            <label for="name">Nome</label> 
                            <input type="text" id="name" name="name" placeholder="Nome" class="form-control"/>
                        </div>
                        <div class="col-md-6">
                            <label for="data_de_nascimento">Data de Nascimento</label>
                            <input type="date" id="data_de_nascimento" name="data_de_nascimento" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone">Telefone</label>
                            <input class="form-control" id="telefone" name="telefone" type="text" placeholder="Telefone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="E-mail" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo">Tipo</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option selected disabled>Escolha uma opção</option>
                                <option value="professor">Professor</option>
                                <option value="coordenador">Coordenador</option>
                            </select><br>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password" placeholder="Senha" class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirm">Confirmar a Senha</label>
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmar a Senha" class="form-control"/>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <legend>Endereço</legend>
                        <div class="row">
                            <div style="margin-left: 15px;" class="form-group col-md-2">
                                <label for="cep">CEP</label>
                                <input class="form-control" id="cep" name="cep" type="text" placeholder="CEP" required/>
                            </div>
                            <br>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="logradouro">Logradouro</label>
                            <input class="form-control" id="logradouro" name="logradouro" type="text" placeholder="Logradouro" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numero">Número</label>
                            <input class="form-control" id="numero" name="numero" type="number" placeholder="Número" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complemento">Complemento</label>
                            <input class="form-control" id="complemento" name="complemento" type="text" placeholder="Complemento"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairro">Bairro</label>
                            <input class="form-control" id="bairro" name="bairro" type="text" placeholder="Bairro" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade</label>
                            <input class="form-control" id="cidade" name="cidade" type="text" placeholder="Cidade" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="uf">Estado</label>
                            <select class="form-control" id="uf" name="uf">
                                <option selected disabled>Escolha uma opção</option>
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
                    <button type="submit" class="btn_2">Cadastrar</button>&nbsp&nbsp&nbsp
                    <a href="{{ route('admin.user') }}" class="btn_3">Cancelar</a>
                </div>
                <div class="form-group col-md-6">
                    
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
@stop