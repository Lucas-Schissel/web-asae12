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
		<h3>Digite um nome:</h3>
		<input type="text" class="form-control" name="nome" placeholder="Nome">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Confirmar">
	</form>
</div>

@endsection
