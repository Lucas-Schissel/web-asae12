@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h2>Cadastro de Itens</h2>
	</span>
</div>

<ul class="list-group list-group-horizontal-sm m-2">
  <li class="list-group-item ">
     	Cliente:
    <span class="badge badge-primary badge-pill">{{ $venda->usuario->nome}}</span>
  </li>
  <li class="list-group-item ">
     	Nº Venda:
    <span class="badge badge-primary badge-pill">{{ $venda->id }}</span>
  </li>
  <li class="list-group-item ">
  		Nº Itens:
    <span class="badge badge-primary badge-pill">{{count($venda->produtos)}}</span>
  </li>
  <li class="list-group-item ">
  		Valor Total:
    <span class="badge badge-primary badge-pill">R$ {{$venda->valor}}</span>
  </li>
  <li class="list-group-item ">
 	 <a class="btn btn-info" href="{{ route('venda_listar') }}" > Finalizar Venda</a>
  </li>
</ul>


<div class="mt-1 p-1">
	<form method="post" action="{{route('vendas_item_add',['id' => $venda->id])}}">
		@csrf
		<select name="id_produto" class="form-control">
        @foreach ($produto as $p)
        <option value="{{ $p->id}}">{{$p->nome." ".$p->preco." ".$p->unidades->nome}}</option>
        @endforeach
        </select>
        <br>
		<input type="number" name="quantidade" class="form-control" 
		min="1" max="10" step="0.01">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Cadastrar">
		<br>
	</form>
		
		<table class="table table-bordered table-hover mt-1">
			<thead class="thead-dark">
				<tr>
					<th>ID Item</th>
					<th>Nome</th>
					<th>Quantidade</th>
					<th>Valor Und</th>
					<th>Subtotal</th>
					<th>Data</th>
					<th>Açoes</th>
				</tr>
			</thead>
			<tbody>
				@foreach($venda->produtos as $p)
				
				<tr>
					<td>{{$p->pivot->id}}</td>
					<td>{{$p->nome}}</td>
					<td>{{$p->pivot->quantidade}}</td>
					<td>R$ {{$p->preco}}</td>
					<td>R$ {{$p->pivot->subtotal}}</td>
					<td>{{$p->pivot->create_at}}</td>
					<td>
						<a class="btn btn-danger" href="#" onclick="exclui({{$p->pivot->id}})">
						<i class="icon-trash-empty"></i>
						</a>
					</td>
				</tr>
				@endforeach				
			</tbody>
		</table>

	</div>
	
	
</div>

<script>
function exclui(id){
		if (confirm("Deseja excluir o item de id: " + id + "?")){
			location.href = "/venda/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>

@endsection