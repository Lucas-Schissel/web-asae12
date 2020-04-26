@extends('template')
@section('conteudo')

<h2>Itens da Vendas {{ $venda->id }}</h2>

    <div class="table-overflow">

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th id="celula1">ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Und</th>
                    <th>Subtotal</th>
                    <th>Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venda->produtos as $v)
                <tr>
                    <td id="celula1">{{$v->pivot->id}}</td>
                    <td>{{$v->nome}}</td>
                    <td>{{$v->pivot->quantidade}}</td>
                    <td>R$ {{$v->preco}}</td>
                    <td>R$ {{$v->pivot->subtotal}}</td>
                    <td>
                        <a class="btn btn-danger" href="#" onclick="exclui({{ $v->pivot->id }})">
                        Excluir
                        <i class="icon-trash-empty"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
<script>
	function exclui(id){
		if (confirm("Deseja excluir o item de id: " + id + "?")){
			location.href = "/venda/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>
@endsection