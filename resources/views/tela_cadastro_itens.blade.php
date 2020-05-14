@extends('template')

@section('conteudo')
			<h1>Cadastre os produtos da venda</h1>

			<form method="POST" action="{{ route('venda_itens_add', ['id' => $venda->id])}}">
				@csrf
			  	<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Produtos</label>
				  </div>
				  <select name="id_produto" class="custom-select" id="inputGroupSelect01">
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

			<div class="mt-4 align-center">
			<h1>Lista de Itens </h1>
		</div>
				
			<table class="mt-3 table table-striped table-dark">
				<thead>
					<th>ID Venda</th>
					<th>Nome</th>
					<th>Quantidade</th>
					<th>Valor Un.</th>
					<th>Subtotal</th>
					<th>Data</th>
					<th>Operações</th>
				</thead>
				<tbody>
					@foreach ($venda->produtos as $v)
					<tr>
						<td>{{ $v->pivot->id }}</td>
						<td>{{ $v->nome }}</td>
						<td>{{ $v->pivot->quantidade }}</td>
						<td>{{ $v->preco }}</td>
						<td>{{ $v->pivot->subtotal }}</td>
						<td>{{ $v->pivot->created_at }}</td>
						<td><a href="#" class="btn btn-danger" onclick="exclui({{ $v->id }})">Remover</a></td>
						<td>
					</tr>
					@endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Total:</b></td>
						<td><b>{{ $venda->valor }}</b></td>
						<td></td>
						<td>
					</tr>
				</tbody>
			</table>
			<a class="btn btn-primary" href="{{ Route('listar_venda')}}">Finalizar Venda</a>
<script>
	function exclui(id){
		if (confirm('Deseja excluir o item de ID: ' + id + '?')){
			//excluindo
			location.href = "/venda/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>
@endsection