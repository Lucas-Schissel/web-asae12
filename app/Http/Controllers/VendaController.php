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
    	$valor = $req->input('valor');
		$id_usuario = $req->input('id_usuario');
		$id_produto = $req->input('id_produto');
    	
		$cli = new Venda();
		$cli->id_produto = $id_produto;
    	$cli->id_usuario = $id_usuario;
    	$cli->valor = $valor;
    	

    	if ($cli->save()){
			echo  "<script>alert('Venda efetuada com Sucesso!');</script>";
    	} else {
    		echo  "<script>alert('Venda nao efetuada!');</script>";
    	}
        return VendaController::telaCadastro();
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


}
