@extends('template')

@section('conteudo')
			<h1>Realize seu cadastro</h1>
			<h6>Para acessar área do cliente e promoções!</h6>


			<form method="POST" action="{{ Route('cadastrar_cliente') }}">
				@csrf
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="email">Email</label>
			      <input required="true" type="email" class="form-control" name="email">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="senha">Senha</label>
			      <input required="true" type="password" class="form-control" name="senha">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="nome">Nome</label>
			    <input required="true" type="text" class="form-control" name="nome" placeholder="João da Silva">
			  </div>
			  <div class="form-group">
			    <label for="endereco">Endereço</label>
			    <input required="true" type="text" class="form-control" name="endereco" placeholder="Av Exemplo 12">
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="cidade">Cidade</label>
			      <input required="true" type="text" class="form-control" name="cidade">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="estado">Estado</label>
			      <select name="estado" class="form-control">
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
			    <div class="form-group col-md-2">
			      <label for="cep">CEP</label>
			      <input type="text" class="form-control" name="cep">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="form-check">
			      <input required="true" class="form-check-input" type="checkbox" id="gridCheck">
			      <label class="form-check-label" for="gridCheck">
			        Verificar
			      </label>
			    </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
@endsection