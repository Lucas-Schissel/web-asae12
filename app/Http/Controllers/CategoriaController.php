<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            return view('tela_cadastro_categoria');
        }
            return view('tela_login');
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $ctg = Categoria::find($id);
            return view("telas_updates.tela_alterar_categoria", [ "ctg" => $ctg ]);
        }
        return view('tela_login');
    }

    function adicionar(Request $req){
        $nome = $req->input('nome');
        $descricao = $req->input('descricao');
            	
    	$ctg = new Categoria();
        $ctg->nome = $nome;
        $ctg->descricao = $descricao;       

    	if ($ctg->save()){
            echo  "<script>alert('Categoria $nome adicionada com Sucesso!');</script>";
    	} else {
            echo  "<script>alert('Categoria $nome nao foi adicionada!!!');</script>";
    	}
        return CategoriaController::telaCadastro();
    }

    function alterar(Request $req, $id){
        $ctg = Categoria::find($id);
        $nome = $req->input('nome');
        $descricao = $req->input('descricao');

        $ctg->nome = $nome;
        $ctg->descricao = $descricao;
        
      
        if ($ctg->save()){
            echo  "<script>alert('Categoria $nome alterada com Sucesso!');</script>";
        } else {
            echo  "<script>alert('Categoria $nome nao foi alterada!!!');</script>";
        }

        return CategoriaController::listar();
    }

    function listar(){
        if (session()->has("login")){
            $ctg = Categoria::all();
            return view("lista_categorias", [ "ctg" => $ctg ]);
            
		}else{
            return view('tela_login');
        }
    }

    function excluir($id){
        if (session()->has("login")){
            $ctg = Categoria::find($id);

            if ($ctg->delete()){
                echo  "<script>alert('Categoria $id excluída com sucesso');</script>";
            } else {
                echo  "<script>alert('Categoria $id nao foi excluída!!!');</script>";
            }
            return CategoriaController::listar();
        }else{
            return view('tela_login');
        }


    }





}
