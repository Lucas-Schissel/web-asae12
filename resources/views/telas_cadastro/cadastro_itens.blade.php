@extends('template')
@section('conteudo')

	<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">
			<h2>Cadastro de Itens</h2>
		</span>
	</div>	

	<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-3 col-sm-6 col-6">
				Cliente:
				<span class="badge badge-primary badge-pill">{{ $venda->usuario->nome}}</span>		
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Nº_Venda :
				<span class="badge badge-primary badge-pill">{{ $venda->id }}</span>		
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Nº_Items:
				<span class="badge badge-primary badge-pill">{{count($venda->produtos)}}</span>	
			</div>
			<div class = "col-md-3 col-sm-6 col-6">
				Valor Total:
				<span class="badge badge-primary badge-pill">R$ {{$venda->valor}}</span>	
			</div>				
	</div>

	<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">.</span>
	</div>

	<form method="post" action="{{route('vendas_item_add',['id' => $venda->id])}}">
	@csrf
	<div class="row">		
	<div class="input-group">
	<div class="input-group-prepend">
    <label class="input-group-text bg-dark text-center text-white" for="inputGroupSelect01">Produto:</label>
  	</div>

			<select class="custom-select" name="id_produto">
			@foreach ($produto as $p)
			<option value="{{ $p->id}}">{{$p->nome." ".$p->preco." ".$p->unidades->nome}}</option>
			@endforeach
			</select>
	</div>			
	</div>

	<div class="row">		
	<div class="input-group">
		<div class="input-group-prepend" >
			<label class="input-group-text bg-dark text-center text-white" for="inputGroupSelect01">Quantidade:</label>
		</div>
		<div class="input-group-prepend">
			<a class= "btn btn-danger" href="#" onclick="rta()">
				<i class="icon-minus-circled"></i>
			</a>
		</div>
		<div class="input-group-prepend">		
				<input type="number" name="quantidade" value="1" min="1" >
		</div>
		<div class="input-group-prepend">
				<a class= "btn btn-success" href="#" onclick="add()">
					<i class="icon-plus-circled"></i>
				</a>		
		</div>
		
	</div>		
	</div>

	<div class="row">	

			
			<input type="submit" class="btn btn-success btn-lg btn-block" value="Cadastrar">
		

	</div>


	</form>


	<div class="row">
			<table class="table table-bordered table-hover mt-1">
				<thead class="thead-dark">
					<tr>
						<th>ID Item</th>
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Valor Und</th>
						<th>Subtotal</th>
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

	<a class="btn btn-info" href="" data-toggle="modal" data-target="#finalizar">Finalizar</a>

<script>
	function excluir(id){
		if (confirm("Deseja excluir a categoria de id: " + id + "?")){
			location.href = "/categoria/excluir/" + id;
		}
	}
</script>
<script>
	function rta(){
		if(document.querySelector("[name='quantidade']").value>1){
			document.querySelector("[name='quantidade']").value =	
			parseInt(document.querySelector("[name='quantidade']").value)-1;
		}
	}
</script>
<script>
	function add(){	
		if(document.querySelector("[name='quantidade']").value>=0){
			document.querySelector("[name='quantidade']").value =	
			parseInt(document.querySelector("[name='quantidade']").value) +1;
		}
	}

</script>

<!-- Modal -->
<div class="modal fade" id="finalizar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
        Deseja Encerrar a Venda?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nao</button>
		<a class="btn btn-info" href="/venda/validar/{{ $venda->id }}" >Sim</a>
      </div>
    </div>
  </div>
</div>
@endsection