@extends('template')
@section('conteudo')

  <div class="card-body">
 		 <div class = "row">
			<div id="conteudo">
			<h3>Cliente: {{$venda->usuario->nome}} Venda Nº {{ $venda->id }}</h3>
			</div>
		 </div>
  </div>


<nav class="navbar navbar-dark bg-dark">
  <form class="form-inline">
    <div class="input-group">
      <div class="input-group-prepend disabled" aria-disabled="true">
        <span class="input-group-text disabled" id="basic-addon1" aria-disabled="true">Cliente:</span>
      </div>
      <input type="text" class="form-control" placeholder="{{$venda->usuario->nome}}" aria-label="Username" aria-describedby="">
    </div>
  </form>
</nav>

<div class="mt-2 p-2">
	<form method="post" action="{{route('vendas_item_add',['id' => $venda->id])}}">
		@csrf
		<select name="id_produto" class="form-control">
        @foreach ($produtos as $p)
        <option value="{{ $p->id}}">{{$p->nome}}</option>
        @endforeach
        </select>
        <br>
		<input type="number" name="quantidade" class="form-control" 
		min="1" max="10" step="0.01">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Cadastrar">
		<br>
	</form>

	<h2> Itens ate o momento R$ {{$venda->valor}}</h2>
	<div class="table-overflow">

		
		<table class="table table-bordered table-hover mt-2">
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
				@foreach($venda->produtos as $v)
				
				<tr>
					<td>{{$v->pivot->id}}</td>
					<td>{{$v->nome}}</td>
					<td>{{$v->pivot->quantidade}}</td>
					<td>R$ {{$v->preco}}</td>
					<td>R$ {{$v->pivot->subtotal}}</td>
					<td>{{$v->pivot->create_at}}</td>
					<td>
						<a class="btn btn-danger" href="#" onclick="exclui({{$v->pivot->id}})">
						<i class="icon-trash-empty"></i>
						</a>
					</td>
				</tr>
				@endforeach				
			</tbody>
		</table>

	</div>
	<a class="btn btn-danger" href="{{ route('venda_listar') }}" > Finalizar Venda</a>
	
</div>

<script>
function exclui(id){
		if (confirm("Deseja excluir o item de id: " + id + "?")){
			location.href = "/venda/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>

@endsection