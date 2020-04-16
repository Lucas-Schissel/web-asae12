@extends('template')

@section('conteudo')
<div class="text-center p-5">
	<h1>Alteração de Produtos</h1>
	<form method="post" action="{{ route('produto_alterar', ['id' => $u->id]) }}">
		@csrf
		<input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $u->nome }}">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>
@endsection