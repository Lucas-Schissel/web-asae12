<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;
use App\Itens;

class VendaController extends Controller
{
    function telaCadastro(){
		if (session()->has("login")){
			$cliente = Cliente::all();
			$produto = Produto::all();
			return view ("telas_cadastro.cadastro_vendas",["pdr"=>$produto],["cli"=>$cliente]);
		}
			return view('tela_login');		
	}
	
	function telaAdicionarItem($id){
		$venda = Venda::find($id);
		$produto = Produto::all();
		$itens = Itens::all();

		return view('telas_cadastro.cadastro_itens')->with(compact('venda','produto','itens'));
		
	}
	
    function adicionar(Request $req){
		$id_usuario = $req->input('id_usuario');
    	
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
			$cliente= Cliente::find($id);
			$produto = Produto::all();

			if (count($cliente->vendas) >0){
				return view('listas.lista_vendas',["pdr"=>$produto],["cli" => $cliente]);
			}else{
				echo "<script>alert('Cliente $cliente->nome nao possui vendas!!!');</script>";
				$cliente = Cliente::all();
				return view("listas.lista_clientes", [ "cli" => $cliente ]);
			}
			
		}

		return view('tela_login');
	}

	function todasVendas(){
		if (session()->has("login")){
			$vendas = Venda::all();
			$produtos = Produto::all();
			$clientes = Cliente::all();
			return view('listas.lista_todas_vendas')->with(compact('produtos','clientes','vendas'));
		}
		return view('tela_login');
	}

	function listar(){
		if (session()->has("login")){
		$vendas = Venda::all();
		return view('listas.lista_vendas_geral',['vendas' => $vendas]);
		}
		return view('tela_login');
	}

	function itensVenda($id){
		$venda = Venda::find($id);

		return view('listas.lista_itens_venda', ['venda' => $venda]);

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

	function excluirItem($id , $id_item){
		$venda = Venda::find($id);
		$item = Itens::find($id_item);
		$item->delete();

		$venda->valor = $venda->valor - $item->subtotal;
	
		$venda->save();

		return redirect()->route('vendas_item_novo', ['id' => $venda->id]);

	}

}
