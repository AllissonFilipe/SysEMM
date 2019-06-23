@extends('adminlte::page')

@section('title', 'Novo Cadastro')

@section('content_header')
    <h1>Cadastrar Responsável</h1>

    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Responsáveis</a></li>
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

            <form method="POST" action="{{ route('responsavel.post') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <fieldset class="form-group">
                    <legend>Informações Pessoais</legend> 
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label> 
                        <input type="text" id="nome" placeholder="Nome" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" placeholder="CPF" name="cpf" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone">Telefone</label>
		                <input class="form-control" id="telefone" type="number" placeholder="Telefone" name="telefone" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="grau_de_parentesco">Grau de Parentesco</label>
                        <input class="form-control" id="grau_de_parentesco" type="text" placeholder="Grau de Parentesco" name="grau_de_parentesco" required/>
                    </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <legend>Endereço</legend>  
                        <div class="form-group col-md-12">
                            <label for="cep">CEP</label>
                            <input class="form-control" id="cep" type="text" placeholder="CEP" name="cep" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="logradouro">Logradouro</label>
                            <input class="form-control" id="logradouro" type="text" placeholder="Logradouro" name="logradouro" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numero">Número</label>
                            <input class="form-control" id="numero" type="number" placeholder="Número" name="numero"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complemento">Complemento</label>
                            <input class="form-control" id="complemento" type="text" placeholder="Complemento" name="complemento"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairro">Bairro</label>
                            <input class="form-control" id="bairro" type="text" placeholder="Bairro" name="bairro" required/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade</label>
                            <input class="form-control" id="cidade" type="text" placeholder="Cidade" name="cidade" required/>
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
                    <button type="submit" class="btn_1">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
    </script>
@stop