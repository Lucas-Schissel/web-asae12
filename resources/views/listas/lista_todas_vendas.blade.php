@extends('template')
@section('conteudo')

<h2>Todas as Vendas Efetuadas:</h2>

@if (count($vendas) >0)

    

        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th id="celula1">ID:</th>
                    <th id="celula2">Data:</th>
                    <th id="celula4">Total:</th>
                    <th id="celula2">Cliente:</th>
                    <th>Operaçoes:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $v)
                <tr>
                    <td id="celula1">{{$v->id}}</td>
                    <td id="celula2">{{$v->updated_at->format('d/m/Y')}}</td>
                    <td id="celula4">R$: {{$v->valor}}</td>
                    <td id="celula2">{{$v->usuario->nome }}</td>    
                    <td>
                        <a class="btn btn-warning" href="{{ route('vendas_itens', [ 'id' => $v->id ])}}"> 
			                Alterar
			                <i class="icon-arrows-cw"></i>
                         </a>
                         <a class="btn btn-info" href="{{ route('vendas_itens', [ 'id' => $v->id ])}}"> 
			                Itens
                            <i class="icon-table"></i>   
                         </a>
                         <a class="btn btn-danger" href="" data-toggle="modal" data-target="#excluir"> 
                            Excluir
                            <i class="icon-trash-empty"></i>
                        </a>
                    </td>  
                </tr>
                @endforeach
            </tbody>
        </table>

<div class="modal fade" id="excluir" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
        Deseja Excluir a Venda?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#finalizar">Nao</button>
		<a class="btn btn-info" href="/venda/excluir/{{ $v->id }}" >Sim</a>
      </div>
    </div>
  </div>
</div>
    

@else
    <div class="alert alert-danger">
        <h3> Nao Existe Vendas Efetuadas </h3>
    </div>
@endif

@endsection