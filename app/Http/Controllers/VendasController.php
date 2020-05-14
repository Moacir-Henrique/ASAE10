<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;

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
        $descricao = $req->input('descricao');

        $cliente = Cliente::find($id);

        $venda = new Venda();
        $venda->nome = $cliente->nome;
        $venda->id_cliente = $id;
        $venda->valor = 0;
        $venda->descricao = $descricao;
        
        if ($venda->save()) {
            $msg1 = $venda->id;
            $msg2 = "";
        }else {
            $msg1 = "Erro ao cadastrar venda!";
            $msg2 = "";
         }

         return redirect()->route('venda_itens_novo', ['id' => $venda->id]);
         //return view('confirm', ['mensagem1' => $msg1 , 'mensagem2' => $venda->id]);


    }

    function listar(){
        if (session()->has('login')) {
            $vendas = Venda::all();

            $cliente = Cliente::all();

        return view('lista_vendas', ['vendas' => $vendas, 'c' => $cliente]);
        } else {
            return view ('welcome');
        }
    }

    function itensVenda($id) {
        $venda = Venda::find($id);

        return view('lista_itens_venda', ['venda' => $venda]);
    }

    function adicionarItensVenda($id) {
        $venda = Venda::find($id);
        $produtos = Produto::all();

        return view('tela_cadastro_itens', ['venda' => $venda, 'produtos' => $produtos]);
    }

    function adicionarItem(Request $req, $id) {
        $id_produto = $req->input('id_produto');
        $quantidade = $req->input('quantidade');

        $produto = Produto::find($id_produto);
        $venda = Venda::find($id);
        $subtotal = $produto->preco * $quantidade;

        $colunas_pivot = ['quantidade' => $quantidade, 'subtotal' => $subtotal];

        $venda->produtos()->attach($produto->id, $colunas_pivot);
        $venda->valor += $subtotal;
        $venda->save();

        return redirect()->route('venda_itens_novo', 
            ['id' => $venda->id]);
    }

    function excluirItem($id, $id_produto){
        $venda = Venda::find($id);
        $subtotal = 0;

        foreach ($venda->produtos as $vp) {
            if ($vp->id == $id_produto) {
                $subtotal = $vp->pivot->subtotal;
                break;
            }
        }

        $venda->valor = $venda->valor - $subtotal;
        $venda->produtos()->detach($id_produto);
        $venda->save();

        return redirect()->route('venda_itens_novo', 
            ['id' => $id]);
    }
}
