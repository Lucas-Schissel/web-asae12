@extends('template')
@section('conteudo')

<h2>Todas as Vendas Efetuadas:</h2>

@if (count($vendas) >0)

    <div class="table-overflow">

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $v)
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

                    @foreach ($cliente as $c)
                    @if ($v->id_usuario == $c->id)
                    <td>               
                        {{$c->nome }}                
                    </td>
                    @endif
                    @endforeach
    
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