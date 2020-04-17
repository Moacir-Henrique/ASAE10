<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;

class VendasController extends Controller
{
    function venda(){
    	if (session()->has('login')) {
    		$cliente = Cliente::all();

        	return view('venda', ['clientes' => $cliente]);
    	} else {
    		return view ('welcome');
    	}


        
    }

    function cadastra_venda(Request $req){
        $id = $req->input('cliente');
        $valor = $req->input('valor');
        $descricao = $req->input('descricao');

        $cliente = Cliente::find($id);

        $venda = new Venda();
        $venda->nome = $cliente->nome;
        $venda->id_cliente = $id;
        $venda->valor = $valor;
        $venda->descricao = $descricao;
        
        if ($venda->save()) {
            $msg1 = "Venda cadastrada com sucesso!";
            $msg2 = "";
        }else {
            $msg1 = "Erro ao cadastrar venda!";
            $msg2 = "";
         }
         return view('confirm', ['mensagem1' => $msg1 , 'mensagem2' => $msg2]);
    }
}
