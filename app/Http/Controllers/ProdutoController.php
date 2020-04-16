<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            return view("tela_cadastro_produto");
        }
        return view('tela_login');
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $pdr = Produto::find($id);
            return view("tela_alterar_produto", [ "u" => $pdr ]);
        }
        return view('tela_login');
    }

    function adicionar(Request $req){
    	$nome = $req->input('nome');
    	
    	$pdr = new Produto();
    	$pdr->nome = $nome;

    	if ($pdr->save()){
            echo  "<script>alert('Produto $nome adicionado com Sucesso!');</script>";
    	} else {
            echo  "<script>alert('Produto $nome nao foi adicionado!!!');</script>";
    	}
        return ProdutoController::telaCadastro();
    }

    function alterar(Request $req, $id){
        $pdr = Produto::find($id);

        $nome = $req->input('nome');
        $pdr->nome = $nome;
      
        if ($pdr->save()){
            echo  "<script>alert('Produto $nome alterado com Sucesso!');</script>";
        } else {
            echo  "<script>alert('Produto $nome nao foi alterado!!!');</script>";
        }

        return ProdutoController::listar();
    }

    function excluir($id){
        if (session()->has("login")){
            $pdr = Produto::find($id);

            if ($pdr->delete()){
                echo  "<script>alert('Produto $id excluído com sucesso');</script>";
            } else {
                echo  "<script>alert('Produto $id nao foi excluído!!!');</script>";
            }
            return ProdutoController::listar();
        }else{
            return view('tela_login');
        }


    }

    function listar(){
        if (session()->has("login")){
            $pdr = Produto::all();
            return view("lista_produtos", [ "us" => $pdr ]);
            
		}else{
            return view('tela_login');
        }
    }

}
