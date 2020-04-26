@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Clientes</h1>
	</span>
</div>

<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-3 col-sm-6 col-6">
				Cliente:
				<span class="badge badge-primary badge-pill">{{count($cli)}}</span>		
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Nº_Venda :
				<span class="badge badge-primary badge-pill"></span>		
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Nº_Items:
				<span class="badge badge-primary badge-pill"></span>	
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Valor Total:
				<span class="badge badge-primary badge-pill"></span>	
			</div>				
</div>

<div class="table-overflow">

	<table id="tablesorter-imasters" class="table table-bordered table-hover mt-2">
		<thead class="thead-dark">
			<tr>
				<th id="celula1">ID</th>
				<th id="celula2">Nome</th>
				<th id="celula3">Login</th>
				<th>Operações</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($cli as $c)
		  <tr class="table-light">
			<td id="celula1">{{ $c->id }}</td>
			<td id="celula2">{{ $c->nome }}</td>
			<td id="celula3">{{ $c->login }}</td>

			<td>

			 <a class="btn btn-warning mt-1" href="{{ route('usuario_update', [ 'id' => $c->id ])}}"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="btn btn-danger mt-1" href="#" onclick="exclui({{ $c->id }})">
			 Excluir
			 <i class="icon-trash-empty"></i>
			 </a>

			 <a class="btn btn-success mt-1" href="{{ route('vendas_cliente', [ 'id' => $c->id ])}}">
			 Vendas
			 <i class="icon-dollar"></i>
			 </a>

			</td>
		  </tr>
		@endforeach
		</tbody>
	</table>

</div>

<div class= "row">
	<div class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('menu') }}">
			<i class="icon-left-circled"></i>
			Voltar		
		</a>
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('usuario_cadastro') }}">
			<i class="icon-plus-circled"></i>
			Novo			
		</a>
	</div>
</div>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o usuário de id: " + id + "?")){
			location.href = "/usuario/excluir/" + id;
		}
	}
</script>

<script type="text/javascript">
$(function() {	
            //aqui podem ter todas as outras instruções JQuery do site, sem perda
	$("#tablesorter-imasters").tablesorter();
            //aqui podem ter mais instruções JQuery, não importa a ordem
});	
</script>

@endsection
