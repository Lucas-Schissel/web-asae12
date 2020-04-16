@extends('template')

@section('conteudo')
<div class="text-center p-5">
	<h1>Alteração de usuário</h1>
	<form method="post" action="{{ route('usuario_alterar', ['id' => $u->id]) }}">
		@csrf
		<input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $u->nome }}">
		<br>
		<input type="text" class="form-control" name="login" placeholder="Login" value="{{ $u->login }}">
		<br>
		<input type="password" class="form-control" name="senha" placeholder="Senha" value="{{ $u->senha }}">
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>
@endsection