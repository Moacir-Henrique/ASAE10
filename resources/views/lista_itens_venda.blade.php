@extends('template')

@section('conteudo')
		<div class="align-center">
			<h1>Venda {{ $venda->id }}</h1>
		</div>
				
			<table class="mt-3 table table-striped table-dark">
				<thead>
					<th>ID Item</th>
					<th>Nome</th>
					<th>Quantidade</th>
					<th>Valor Unitário</th>
					<th>Subtotal</th>
					<th>Data</th>
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
						<td>
							<a class="btn btn-info" href="">Itens</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
@endsection