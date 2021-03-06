<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AppController extends Controller
{
	function welcome() {
		return view('welcome');
	}

    function login(Request $req) {
    	$email = $req->input('email');
    	$senha = $req->input('senha');

    	$cliente = Cliente::where('email', '=', $email)->first();
    	//encontra o usuário ou dados ficam vazios

    	if ($cliente and $cliente->senha == $senha) {
    		$variaveis = ["login" => $email];
    		session($variaveis);
			
			return view('template', ['c' => $cliente]);
    		//return redirect()->route('lista_cliente');
    	} else{
    		return view('confirm', ['mensagem1' => "Senha ou E-mail inválidos" , 'mensagem2' => ""]);
    	}
    }

    function logout(){
    	session()->forget("login");

    	return redirect()->route('welcome');
    }
}
