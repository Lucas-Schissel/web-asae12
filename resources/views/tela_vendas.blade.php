@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Venda para Clientes</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('venda_add') }}">
		@csrf

		<h4>Selecione um cliente:</h4>
		<select name="id_usuario" class="form-control">
        @foreach ($usuario as $u)
        <option value="{{ $u->id}}">{{$u->nome}}</option>
        @endforeach
		</select>
		<br>
		<input type="submit" class="btn btn-success" value="Cadastrar">
	</form>
</div>

<div class="mt-2 p-2">
@yield('items')
</div>

@endsection