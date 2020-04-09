@extends('template')


@section('conteudo')
		<div class="align-center">
			<h1>Lista de Clientes</h1>
			<h6>Lista de todos os clientes da FraiBeer!</h6>
		</div>
				
			<table class="mt-3 table table-striped table-dark">
				<thead>
					<th>ID</th>
					<th>Nome</th>
					<th>Endereço</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th>CEP</th>
					<th>E-mail</th>
					<th>Operações</th>
				</thead>
				<tbody>
					@foreach ($clientes as $c)
					<tr>
						<td>{{ $c->id }}</td>
						<td>{{ $c->nome }}</td>
						<td>{{ $c->endereco }}</td>
						<td>{{ $c->cidade }}</td>
						<td>{{ $c->estado }}</td>
						<td>{{ $c->cep }}</td>
						<td>{{ $c->email }}</td>
						<td>
							<a class="btn btn-warning btn-sm" href="{{ route('tela_altera_cliente', ['id' => $c->id ]) }}">Alterar</a>
							<a class="btn btn-danger btn-sm" onclick="exclui({{$c->id}})">Excluir</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>


<script>
	function exclui(id){
		if (confirm('Deseja excluir o usuário de ID: ' + id + '?')){
			//excluindo
			location.href = "/cliente/delete/" + id;
		}
	}
</script>

@endsection