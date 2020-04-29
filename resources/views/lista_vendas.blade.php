@extends('template')

@section('conteudo')
		<div class="align-center">
			<h1>Lista de Vendas</h1>
		</div>
				
			<table class="mt-3 table table-striped table-dark">
				<thead>
					<th>ID Venda</th>
					<th>Valor</th>
					<th>Data</th>
					<th>Operações</th>
				</thead>
				<tbody>
					@foreach ($vendas as $v)
					<tr>
						<td>{{ $v->id }}</td>
						<td>{{ $v->valor }}</td>
						<td>{{ $v->created_at }}</td>
						<td>
							<a class="btn btn-info" href="{{ Route('venda_itens', ['id' => $v->id]) }}">Itens</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
@endsection