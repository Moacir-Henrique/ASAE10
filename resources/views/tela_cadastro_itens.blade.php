@extends('template')

@section('conteudo')
			<h1>Cadastre os produtos da venda</h1>

			<form method="POST" action="">
				@csrf
			  	<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Produtos</label>
				  </div>
				  <select name="produto" class="custom-select" id="inputGroupSelect01">
				    @foreach ($produtos as $p) 
				    <option value="{{$p->id}}">{{$p->nome}}</option>
				    @endforeach
				  </select>
				</div>

				<div class="input-group mb-3">
				  <input type="number" class="form-control" name="quantidade" min="0" step="0.01">
			  	</div>

				<!-- CHECAGEM -->
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