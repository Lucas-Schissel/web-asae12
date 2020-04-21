@extends('template')
@section('conteudo')

<h2>Todas as Vendas Efetuadas:</h2>

@if (count($vendas) >0)

    <div class="table-overflow">

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>ID:</th>
                    <th>Valor Total:</th>
                    <th>Cliente:</th>
                    <th>Operaçoes:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>R$: {{$v->valor}}</td>
                    <td>{{$v->usuario->nome }}</td>    
                    <td>
                        <a class="btn btn-warning" href="{{ route('vendas_itens', [ 'id' => $v->id ])}}"> 
			                Alterar
			                <i class="icon-arrows-cw"></i>
                         </a>
                         <a class="btn btn-info" href="{{ route('vendas_itens', [ 'id' => $v->id ])}}"> 
			                Itens
                            <i class="icon-table"></i>   
                         </a>
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

@else
    <div class="alert alert-danger">
        <h3> Nao Existe Vendas Efetuadas </h3>
    </div>
@endif

@endsection