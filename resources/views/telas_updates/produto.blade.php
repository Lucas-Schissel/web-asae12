@extends('template')
@section('conteudo')

<div class="text-center p-5">
	<h1>Alteração de Produto</h1>
	<form method="post" action="{{ route('produto_alterar', ['id' => $pdr->id]) }}">
		@csrf
		<br>
		<input type="text" class="form-control" name="nome"  value="{{ $pdr->nome }}" required>
		<br>
		<input type="number" class="form-control" step="0.01"  name="preco" value="{{ $pdr->preco }}" required>
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>

@endsection