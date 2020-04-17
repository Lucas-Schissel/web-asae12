@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Venda para Clientes</h1>
	</span>
</div>

<div class="mt-5 p-5">
	<form method="post" action="{{ route('venda_add') }}">
		@csrf

		<h4>Cliente:</h4>
		<select name="id_usuario" class="form-control">
        @foreach ($usuario as $u)
        <option value="{{ $u->id}}">{{$u->nome}}</option>
        @endforeach
		</select>
		<br>

		<!--<h4>Produto:</h4>
		<select name="id_produto" class="form-control">
        @foreach ($produto as $p)
		<option value="{{ $p->id}}">{{$p->nome}}</option>
        @endforeach
		</select>		
		<h4>Valor:</h4>
		<input type="number" step="0.01" class="form-control" name="valor" placeholder="Valor">-->
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Cadastrar">
	</form>
</div>

@endsection