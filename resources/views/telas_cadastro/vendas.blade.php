@extends('template')
@section('conteudo')
<h1>Lista de Vendas</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Valor</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($us as $u)
		<tr>
			<td>{{ $u->id }}</td>
			<td>{{ $u->id_usuario }}</td>
			<td>{{ $u->valor }}</td>
			<td>
			    <a class="btn btn-danger" href="#" onclick="exclui({{ $u->id }})">Excluir</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a class="btn btn-primary" href="{{ route('venda_cadastro') }}">Nova Venda</a>

<script>
	function exclui(id){
		if (confirm("Deseja excluir a venda de id: " + id + "?")){
			location.href = "/venda/excluir/" + id;
		}
	}
</script>

@endsection