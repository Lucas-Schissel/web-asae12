<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Clientes

Route::get('/usuario/cadastro', 'ClienteController@telaCadastro')
	->name('usuario_cadastro');

Route::get('/usuario/alterar/{id}', 'ClienteController@telaAlteracao')
	->name('usuario_update');
	
Route::post('/usuario/adicionar', 'ClienteController@adicionar')
	->name('usuario_add');

Route::post('/usuario/alterar/{id}', 'ClienteController@alterar')
	->name('usuario_alterar');

Route::get('/usuario/excluir/{id}', 'ClienteController@excluir')
	->name('usuario_delete');

Route::get('/usuario/listar', 'ClienteController@listar')
	->name('usuario_listar');

//Login

Route::get('/tela_login', 'AppController@tela_login')
	->name('tela_login');

Route::post('/login', 'AppController@login')
	->name('logar');

Route::get('/logout', 'AppController@logout')
	->name('logout');

Route::get('/menu', 'AppController@menu')
	->name('menu');

//Vendas
Route::get('/venda/{id}/itens', 'VendaController@itensVenda')
	->name('vendas_itens');

Route::get('/venda/listar', 'VendaController@listar')
	->name('venda_listar');

Route::get('/venda/cadastrar', 'VendaController@telaCadastro')
	->name('venda_cadastro');

Route::post('/venda/adicionar', 'VendaController@adicionar')
	->name('venda_add');

Route::get('/venda/excluir/{id}', 'VendaController@excluir')
	->name('venda_delete');

Route::get('venda/cliente/{id}', 'VendaController@vendasPorCliente')
	->name('vendas_cliente');

Route::get('venda/total/', 'VendaController@todasVendas')
	->name('vendas_total');

//Produtos

Route::get('/produto/cadastro', 'ProdutoController@telaCadastro')
	->name('produto_cadastro');

Route::get('/produto/alterar/{id}', 'ProdutoController@telaAlteracao')
	->name('produto_update');
	
Route::post('/produto/adicionar', 'ProdutoController@adicionar')
	->name('produto_add');

Route::post('/produto/alterar/{id}', 'ProdutoController@alterar')
	->name('produto_alterar');

Route::get('/produto/excluir/{id}', 'ProdutoController@excluir')
	->name('produto_delete');

Route::get('/produto/listar', 'ProdutoController@listar')
	->name('produto_listar');