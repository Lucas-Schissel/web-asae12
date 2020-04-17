@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Cadastro de Produtos</h1>
	</span>
</div>

<div class="mt-2 p-5">
	<form method="post" action="{{ route('produto_add') }}">
		@csrf
		<h4>Digite um nome:</h4>
		<input type="text" class="form-control" name="nome" placeholder="Nome">
		<br>
		<h4>Digite o preço:</h4>
		<input type="number" class="form-control" step="0.01"  name="preco" placeholder="Preço">
		<br>
		<h4>Digite a Descriçao:</h4>
		<input type="text" class="form-control" name="descricao" placeholder="Descriçao">
		<br>
		<h4>Escolha a und</h4>
		<input type="text" class="form-control" name="und" placeholder="Unidade">
		<br>
		<input type="submit"  class="btn btn-success btn-lg btn-block" value="Confirmar">
		
	</form>
</div>

@endsection
