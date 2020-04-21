@extends('template')
@section('conteudo')

<h2>Vendas do usuario: {{ $cliente->nome}}</h2>

    <div class="table-overflow">

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente->vendas as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    @foreach ($produto as $p)
                    @if ($v->id_produto == $p->id)
                    <td>               
                        {{$p->nome }}                
                    </td>
                    @endif
                    @endforeach
                    <td>{{$v->valor}}</td>
                    <td>
                        <a class="btn btn-danger" href="#" onclick="exclui({{ $v->id }})">
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
            if (confirm("Deseja excluir a venda de id: " + id + "?")){
                location.href = "/venda/excluir/" + id;
            }
        }
        
    </script>

@endsection