<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AppController extends Controller
{
	function menu(){
		if (session()->has("login")){			
		return view("resultado", ["mensagem" => "Bem Vindo"]);
		}
		return view('tela_login');
	}

    function tela_login(){
		if (session()->has("login")){
			return redirect()->route('menu');
		}
			return view('tela_login');

    }

    function login(Request $req){
    	$login = $req->input('login');
		$senha = $req->input('senha');
		

    	$cli = Cliente::where('login', '=', $login)->first();

    	if ($cli and $cli->senha == $senha){

			$variaveis = ["login" => $login];
			session($variaveis);

    		return redirect()->route('menu');
    	} else {
			echo  "<script>alert('Usuário ou senha inválidos. Tente cadastrar um usuario');</script>";
            return view('tela_login');
    	}
	}

	function logout(){
		session()->forget("login");
		return redirect()->route('tela_login');
	}

}
