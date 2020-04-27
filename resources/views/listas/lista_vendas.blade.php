@extends('template')
@section('conteudo')
<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">
			<h2>Lista de Vendas</h2>
		</span>
	</div>	

<div class="row bg-dark text-white text-center border border-white rounded ">
			<div class = "col-md-4 col-sm-4 col-4">
				Cliente:
				<span class="badge badge-primary badge-pill">{{$cliente->nome}}</span>		
			</div>
			<div class = "col-md-4 col-sm-4 col-4">
				Nº Vendas:
				<span class="badge badge-primary badge-pill">{{count($cliente->vendas)}}</span>		
			</div>
			<div class = "col-md-4 col-sm-4 col-4">
				Valor Total:
				<span class="badge badge-primary badge-pill">{{$total}}</span>	
			</div>				
	</div>
<table class="table table-bordered table-hover mt-1">
	<thead class="thead-dark">
		<tr>
			<th id="celula1">ID:</th>
            <th id="celula2">Data:</th>
            <th id="celula4">Total:</th>
            <th>Operaçoes:</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($vendas as $v)
		<tr>
			<td id="celula1">{{$v->id }}</td>
			<td id="celula2">{{$v->updated_at->format('d/m/Y')}}</td>
			<td id="celula4">R$: {{$v->valor}}</td> 
			<td>
                 <a class="btn btn-warning m-1" href="{{ route('vendas_itens', [ 'id' => $v->id ])}}"> 
			        Alterar
                	<i class="icon-arrows-cw"></i>
                </a>
                <a class="btn btn-info m-1" href="{{ route('vendas_itens', [ 'id' => $v->id ])}}"> 
			        Itens
                	<i class="icon-table"></i>   
                </a>
                <a class="btn btn-danger m-1" href="" data-toggle="modal" data-target="#excluir"> 
                    Excluir
                    <i class="icon-trash-empty"></i>
                </a>
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