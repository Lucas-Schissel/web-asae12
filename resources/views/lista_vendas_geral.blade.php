@extends('template')
@section('conteudo')

<h2>Vendas</h2>

    <div class="table-overflow">

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Operaçoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->valor}}</td>
                    <td>{{$v->create_at}}</td>
                    <td>
                        <a class="btn btn-info" href="#">Itens</a>
                        <i class="icon-table"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection