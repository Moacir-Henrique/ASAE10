<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Venda;

class ClientesController extends Controller
{
    function cadastro(){
    	return view('cadastro');
    }

    function cadastrarCliente(Request $req){
    	$nome = $req->input('nome');
    	$endereco = $req->input('endereco');
    	$cidade = $req->input('cidade');
    	$estado = $req->input('estado');
    	$cep = $req->input('cep');
    	$email = $req->input('email');
    	$senha = $req->input('senha');

    	$cliente = new Cliente();
    	$cliente->nome = $nome;
    	$cliente->endereco = $endereco;
    	$cliente->cidade = $cidade;
    	$cliente->estado = $estado;
    	$cliente->cep = $cep;
    	$cliente->email = $email;
    	$cliente->senha = $senha;

    	if ($cliente->save()) {
            $msg1 = "Cadastro realizado com sucesso!";
            $msg2 = "Parabéns, você agora é um membro da FraiBeer!";
         } else {
            $msg1 = "Cadastro não foi bem sucedido!";
            $msg2 = "Infelizmente não foi possível realizar seu cadastro! Tente novamente mais tarde!";
         }

         return view('confirm', ['mensagem1' => $msg1 , 'mensagem2' => $msg2]);

    }

    function listarCliente() {
        $clientes = Cliente::all();

        return view('lista', ['clientes' => $clientes]);
    }

    function tela_altera_cliente($id){
        $cliente = Cliente::find($id);

        return view('altera_cliente', ['c' => $cliente]);
    }

    function altera_cliente(Request $req, $id){
        $nome = $req->input('nome');
        $endereco = $req->input('endereco');
        $cidade = $req->input('cidade');
        $estado = $req->input('estado');
        $cep = $req->input('cep');
        $email = $req->input('email');

        $cliente = Cliente::find($id);
        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        $cliente->cidade = $cidade;
        $cliente->estado = $estado;
        $cliente->cep = $cep;
        $cliente->email = $email;

        if ($cliente->save()) {
            $msg1 = "Cadastro atualizado com sucesso!";
            $msg2 = "";
         } else {
            $msg1 = "Atualização não foi bem sucedido!";
            $msg2 = "";
         }

         return view('confirm', ['mensagem1' => $msg1 , 'mensagem2' => $msg2]);
    }

    function deletar_cliente($id){
        $cliente = Cliente::find($id);

        if ($cliente->delete()) {
            $msg1 = "Usuário deletado com sucesso!";
            $msg2 = "";
        }else {
            $msg1 = "Erro ao excluir usuário!";
            $msg2 = "";
         }

         return view('confirm', ['mensagem1' => $msg1 , 'mensagem2' => $msg2]);
    }

    function venda(){
        $cliente = Cliente::all();

        return view('venda', ['clientes' => $cliente]);
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