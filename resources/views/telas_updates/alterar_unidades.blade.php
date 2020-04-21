@extends('template')
@section('conteudo')

<div class="text-center p-5">
	<h1>Alteração de Unidades</h1>
	<form method="post" action="{{ route('unidades_alterar', ['id' => $und->id]) }}">
		@csrf
		<br>
		<input type="text" class="form-control" name="nome"  value="{{ $und->nome }}" required>
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>

@endsection