<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AppController@welcome')->name('welcome');

//tela cadastro cliente
Route::get('/cliente/cadastro', 'ClientesController@cadastro');
//cadastrar no banco
Route::post('/cliente/new', 'ClientesController@cadastrarCliente')->name('cadastrar_cliente');
//tela lista de Clientes
Route::get('/cliente/lista', 'ClientesController@listarCliente')->name("lista_cliente");

//redireciona para tela de alteração
Route::get('/cliente/update/{id}', 'ClientesController@tela_altera_cliente')->name('tela_altera_cliente');
//chama função para alterar e salvar
Route::post('/cliente/update/{id}', 'ClientesController@altera_cliente')->name('altera_cliente');

//excluindo cliente
Route::get('/cliente/delete/{id}', 'ClientesController@deletar_cliente')->name('deleta_cliente');

//cadastro de venda
Route::get('/venda', 'VendasController@venda')->name('venda');
Route::post('/venda/new', 'VendasController@cadastra_venda')->name('cadastrar_venda');

//Realizar Login
Route::post('/login', 'AppController@login')->name('logar');
//realizar logout
Route::get('/logout', 'AppController@logout')->name('logout');

//realiza chamado tela vendas
Route::get('/venda/listar', 'VendasController@listar')->name('listar_venda');
//Chama tela itens da venda
Route::get('/venda/{id}/itens', 'VendasController@itensVenda')->name('venda_itens');