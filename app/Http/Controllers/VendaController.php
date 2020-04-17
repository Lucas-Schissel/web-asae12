<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;

class VendaController extends Controller
{
    function telaCadastro(){
		if (session()->has("login")){
			$cliente = Cliente::all();
			$produto = Produto::all();
			return view ("tela_vendas",["produto"=>$produto],["usuario"=>$cliente]);
		}
			return view('tela_login');		
    }
	
    function adicionar(Request $req){
    	//$valor = $req->input('valor');
		$id_usuario = $req->input('id_usuario');
		$id_produto = $req->input('id_produto');
    	
		$cli = new Venda();
    	$cli->id_usuario = $id_usuario;
    	$cli->valor = 0;
    	

    	if ($cli->save()){
			echo  "<script>alert('Venda efetuada com Sucesso!');</script>";
    	} else {
    		echo  "<script>alert('Venda nao efetuada!');</script>";
		}
		return redirect()->route('vendas_item_novo', ['id' => $cli->id]);
        //return VendaController::telaCadastro();
	}
	
	function excluir($id){
		if (session()->has("login")){
			$vnd = Venda::find($id);

			if ($vnd->delete()){
                echo  "<script>alert('Venda $id excluída com sucesso');</script>";
            } else {
                echo  "<script>alert('Venda $id nao foi excluída!!!');</script>";
            }				
			return 	VendaController::vendasPorCliente($id);

		}else{
            return view('tela_login');
        }
  
    }

    function vendasPorCliente($id){
		if (session()->has("login")){
			$cli = Cliente::find($id);
			$produto = Produto::all();

			if (count($cli->vendas) >0){
				return view('lista_vendas',["produto"=>$produto],["cliente" => $cli]);
			}else{
				echo "<script>alert('Cliente $cli->nome nao possui vendas!!!');</script>";
				$cli = Cliente::all();
				return view("lista", [ "us" => $cli ]);
			}
			
		}

		return view('tela_login');
	}

	function todasVendas(){
		if (session()->has("login")){
			$vendas = Venda::all();
			$produto = Produto::all();
			$cliente = Cliente::all();
			return view('lista_todas_vendas')->with(compact('produto','cliente','vendas'));
		}
		return view('tela_login');
	}

	function listar(){
		if (session()->has("login")){
		$vendas = Venda::all();
		return view('lista_vendas_geral',['vendas' => $vendas]);
		}
		return view('tela_login');
	}

	function itensVenda($id){
		$venda = Venda::find($id);

		return view('lista_itens_venda', ['venda' => $venda]);

	}

	function telaAdicionarItem($id){
		$venda = Venda::find($id);
		$produtos = Produto::all();

		return view('tela_cadastro_itens', ['venda' => $venda , 'produtos' => $produtos]);
	}

	function adicionarItem(Request $req, $id){
		$id_produto = $req->input('id_produto');
		$quantidade = $req->input('quantidade');

		$produto = Produto::find($id_produto);
		$venda = Venda::find($id);
		$subtotal = $produto->preco * $quantidade;

		$colunas_pivot = [
				'quantidade' => $quantidade,
				'subtotal' => $subtotal
		];

		
		$venda->produtos()->attach($produto->id, $colunas_pivot);
		$venda->valor += $subtotal;
		$venda->save();
		return redirect()->route('vendas_item_novo', ['id' => $venda->id]);
	}

	function excluirItem($id_produto, $id){
		$venda = Venda::find($id);
		$subtotal = 0;
		
		foreach($venda->produtos as $vp){
			if($vp->id == $id_produto){
				$subtotal = $vp->pivot->subtotal;
			break;

			}
		}

		$venda->valor = $venda->valor - $subtotal;
		$venda->produtos()->detach($id_produto);
		$venda->save();		
		return redirect()->route('vendas_item_novo', ['id' => $venda->id]);

	}

}
