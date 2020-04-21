<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            session()->forget("login");
        }
    	return view("telas_cadastro.cadastro_cliente");
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $cliente = Cliente::find($id);
            return view("telas_updates.alterar_cliente", [ "cli" => $cliente ]);
        }
        return view('tela_login');
    }

    function adicionar(Request $req){
    	$nome = $req->input('nome');
    	$login = $req->input('login');
    	$senha = $req->input('senha');

    	$cli = new Cliente();
    	$cli->nome = $nome;
    	$cli->login = $login;
    	$cli->senha = $senha;

    	if ($cli->save()){
            echo  "<script>alert('Cliente $nome cadastrado com Sucesso!');</script>";
    	} else {
    		echo  "<script>alert('Cliente $nome nao foi cadastrado!');</script>";
        }
        return view('tela_login');
    }

    function alterar(Request $req, $id){
        $cli = Cliente::find($id);

        $nome = $req->input('nome');
        $login = $req->input('login');
        $senha = $req->input('senha');

        $cli->nome = $nome;
        $cli->login = $login;
        $cli->senha = $senha;

        if ($cli->save()){
            echo  "<script>alert('Cliente $nome alterado com sucesso');</script>";
        } else {
            echo  "<script>alert('Cliente $nome nao foi alterado!');</script>";
        }
        return  ClienteController::listar();
    }

    function excluir($id){
        if (session()->has("login")){
                $cli = Cliente::find($id);
                if ($cli->delete()){
                    echo  "<script>alert('Cliente $id excluído com sucesso');</script>";
                } else {
                    echo  "<script>alert('Cliente $id nao foi excluído!!!');</script>";
                }

                return  ClienteController::listar();
        }else{
        return view('tela_login');
        }
    
    }

    function listar(){
        if (session()->has("login")){
            $cliente = Cliente::all();
            return view("listas.lista_clientes", [ "cli" => $cliente ]);
		}else{
            return view('tela_login');
        }
        
    }

}
