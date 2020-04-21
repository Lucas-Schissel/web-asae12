<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\Unidade;

class ProdutoController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            $categoria = Categoria::All();
            $unidade = Categoria::All();

            return view('telas_cadastro.cadastro_produtos')->with(compact('categoria','unidade'));
        }
        return view('tela_login');
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $pdr = Produto::find($id);
            return view("telas_updates.alterar_produto", [ "pdr" => $pdr ]);
        }
        return view('tela_login');
    }

    function adicionar(Request $req){
        $nome = $req->input('nome');
        $preco = $req->input('preco');
        $categoria = $req->input('categoria');
        $und = $req->input('und');
    	
    	$pdr = new Produto();
        $pdr->nome = $nome;
        $pdr->preco = $preco;
        $pdr->id_categoria = $categoria;
        $pdr->id_unidade = $und;

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
        $preco = $req->input('preco');

        $pdr->preco = $preco;
        $pdr->nome = $nome;
      
        if ($pdr->save()){
            echo  "<script>alert('Produto $nome alterado com Sucesso!');</script>";
        } else {
            echo  "<script>alert('Produto $nome nao foi alterado!!!');</script>";
        }

        return ProdutoController::listar();
    }

    function listar(){
        if (session()->has("login")){
            $pdr = Produto::all();
            return view("listas.lista_produtos", [ "pdr" => $pdr ]);
            
		}else{
            return view('tela_login');
        }
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

}
