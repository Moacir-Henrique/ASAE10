@extends('template')

@section('conteudo')
			<h1>Realize sua Venda</h1>


			<form method="POST" action="{{ Route('cadastrar_venda') }}">
				@csrf
			   <div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Clientes</label>
				  </div>
				  <select name="cliente" class="custom-select" id="inputGroupSelect01">
				    @foreach ($clientes as $c)
				    <option value="{{$c->id}}">{{$c->nome}}</option>
				    @endforeach
				  </select>
				</div>
			  <div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">R$</span>
				  </div>
				  <input type="text" class="form-control" name="valor" placeholder="Valor">
			  </div>
			  <div class="form-group">
			    <label for="descricao">Descrição</label>
			    <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
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