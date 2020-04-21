@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Produtos</h1>
	</span>
</div>

<div class="table-overflow">

	<table class="table table-bordered table-hover mt-2">
		<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Preço</th>
				<th>Operações</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($pdr as $p)
		  <tr class="table-light">
			<td>{{ $p->id }}</td>
			<td>{{ $p->nome }}</td>
			<td>R$ {{ $p->preco }}</td>

			<td>

			 <a class="btn btn-warning" href="{{ route('produto_update', [ 'id' => $p->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="btn btn-danger" href="#" onclick="exclui({{ $p->id }})">
			 Excluir
			 <i class="icon-trash-empty"></i>
			 </a>


			</td>
		  </tr>
		@endforeach
		</tbody>
	</table>

</div>

<div class= "row">
	<div class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
		<a class="btn btn-secondary m-2 p-2" type="button2" href="{{ route('menu') }}">
			<i class="icon-left-circled"></i>
			Voltar		
		</a>
		<a class="btn btn-secondary m-2 p-2" type="button2" href="{{ route('produto_cadastro') }}">
			<i class="icon-plus-circled"></i>
			Novo			
		</a>
	</div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o produto de id: " + id + "?")){
			location.href = "/produto/excluir/" + id;
		}
	}
</script>

@endsection
