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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente/cadastro', 'ClientesController@cadastro');
Route::post('/cliente/new', 'ClientesController@cadastrarCliente')->name('cadastrar_cliente');
Route::get('/cliente/lista', 'ClientesController@listarCliente')->name("lista_cliente");

//redireciona para tela de alteração
Route::get('/cliente/update/{id}', 'ClientesController@tela_altera_cliente')->name('tela_altera_cliente');
//chama função para alterar e salvar
Route::post('/cliente/update/{id}', 'ClientesController@altera_cliente')->name('altera_cliente');

//excluindo cliente
Route::get('/cliente/delete/{id}', 'ClientesController@deletar_cliente')->name('deleta_cliente');

//cadastro de venda
Route::get('/venda', 'VendasController@venda');
Route::post('/venda/new', 'VendasController@cadastra_venda')->name('cadastrar_venda');

//Realizar Login
Route::post('/login', 'AppController@login')->name('logar');