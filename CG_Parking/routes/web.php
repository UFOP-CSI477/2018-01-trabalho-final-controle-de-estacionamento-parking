<?php

$this->group(['middleware' => ['auth','admin'], 'prefix' => 'admin', 'namespace' => 'Admin'] ,function(){
    // HOME
    $this->get('home', 'AdminController@index') -> name('home.home');
    // PERFIL
    $this->get('/settings', 'UserController@show2') -> name('user.showw');
    $this->get('/settings/Edit', 'UserController@editar') -> name('user.editt');
    $this->post('/settings/Edit', 'UserController@update2') -> name('user.updatee');
    $this->get('/settings/password', 'UserController@password') -> name('user.password');
    $this->post('/settings/password', 'UserController@updatepassword') -> name('user.updatepassword');
    // VAGA - ROUTE
    $this->post('/Vaga/Index', 'VagaController@show') -> name('vaga.show');
    $this->get('/Vaga/Index', 'VagaController@index') -> name('vaga.index');
    $this->get('/Vaga/Create', 'VagaController@create') -> name('vaga.create');
    $this->get('/Vaga/{id}/Edit', 'VagaController@edit') -> name('vaga.edit');
    $this->get('/Vaga/Destroy/{id}', 'VagaController@destroy') -> name('vaga.destroy');
    $this->post('/Vaga/Create', 'VagaController@store') -> name('vaga.store');
    $this->post('/Vaga/{id}/Edit', 'VagaController@update') -> name('vaga.update');
    // TIPOVEICULO - ROUTE
    $this->post('/Valor/Index', 'TipoVeiculoController@show') -> name('valor.show');
    $this->get('/Valor/Index', 'TipoVeiculoController@index') -> name('valor.index');
    $this->get('/Valor/Create', 'TipoVeiculoController@create') -> name('valor.create');
    $this->get('/Valor/{id}/Edit', 'TipoVeiculoController@edit') -> name('valor.edit');
    $this->get('/Valor/Destroy/{id}', 'TipoVeiculoController@destroy') -> name('valor.destroy');
    $this->post('/Valor/Create', 'TipoVeiculoController@store') -> name('valor.store');
    $this->post('/Valor/{id}/Edit', 'TipoVeiculoController@update') -> name('valor.update');
    // USER - ROUTE
    $this->post('/User/Index', 'UserController@show') -> name('user.show');
    $this->get('/User/Index', 'UserController@index') -> name('user.index');
    $this->get('/User/Create', 'UserController@create') -> name('user.create');
    $this->get('/User/{id}/Edit', 'UserController@edit') -> name('user.edit');
    $this->get('/User/Destroy/{id}', 'UserController@destroy') -> name('user.destroy');
    $this->post('/User/Create', 'UserController@store') -> name('user.store');
    $this->post('/User/{id}/Edit', 'UserController@update') -> name('user.update');
    // RELATORIOS
    $this->get('/RelVenda', 'ValorController@index') -> name('relatoriovalor.index');
    $this->post('/RelVenda', 'ValorController@show') -> name('relatoriovalor.show');
});

$this->redirect('/', '/admin/home',301);
$this->redirect('/admin', '/admin/home',301);
$this->redirect('/user', '/user/home',301);
$this->redirect('/oper', '/oper/home',301);

$this->group(['middleware' => ['auth','user'], 'prefix' => 'user', 'namespace' => 'User'] ,function(){
    // HOME
    $this->get('home', 'UserController@index') -> name('user.home');
    // PERFIL
    $this->get('/settings', 'UserController@show2') -> name('uuuser.showw');
    $this->get('/settings/Edit', 'UserController@editar') -> name('uuuser.editt');
    $this->post('/settings/Edit', 'UserController@update2') -> name('uuuser.updatee');
    $this->get('/settings/password', 'UserController@password') -> name('uuuser.password');
    $this->post('/settings/password', 'UserController@updatepassword') -> name('uuuser.updatepassword');
    // VAGA
    $this->get('Vaga/Index', 'VagaController@index') -> name('uservaga.index');
    $this->post('Vaga/Index', 'VagaController@show') -> name('uservaga.show');
    // VALOR
    $this->get('Valor/Index', 'ValorController@index') -> name('uservalor.index');
    $this->post('Valor/Index', 'ValorController@show') -> name('uservalor.show');
    // HISTORICO
    $this->get('Historico', 'HistoricoController@index') -> name('historico.index');
    $this->post('Historico', 'HistoricoController@show') -> name('historico.show');
});

$this->group(['middleware' => ['auth','oper'], 'prefix' => 'oper', 'namespace' => 'Oper'] ,function(){
    // HOME
    $this->get('home', 'OperController@index') -> name('oper.home');
    // PERFIL
    $this->get('/settings', 'UserController@show2') -> name('uuser.showw');
    $this->get('/settings/Edit', 'UserController@editar') -> name('uuser.editt');
    $this->post('/settings/Edit', 'UserController@update2') -> name('uuser.updatee');
    $this->get('/settings/password', 'UserController@password') -> name('uuser.password');
    $this->post('/settings/password', 'UserController@updatepassword') -> name('uuser.updatepassword');
    // REGISTRO DE ENTRADA
    $this->get('/RegEntrada/NotRegistered', 'EntradaController@index') -> name('entrada.index');
    $this->post('/RegEntrada/NotRegistered', 'EntradaController@store') -> name('entrada.store');

    $this->get('/RegEntrada/Registered', 'EntradaController@index2') -> name('entradas.index');
    $this->post('/RegEntrada/Registered/Create', 'EntradaController@store2') -> name('entradas.store');
    $this->post('/RegEntrada/Registered', 'EntradaController@show2') -> name('entradas.show');
    // REGISTRO DE SAIDA
    $this->get('/RegSaida', 'SaidaController@index') -> name('saida.index');
    $this->post('/RegSaida', 'SaidaController@store') -> name('saida.store');
    // RESULTADO
    $this->get('/Resultado', 'ResultadoController@index2') -> name('resultado.index');
    $this->post('/Resultado', 'ResultadoController@show') -> name('resultado.show');
    $this->get('/Resultado/{id}/Valor', 'ResultadoController@index') -> name('result.index');
    //LISTAS
    $this->get('/ListValor', 'TipoVeiculoController@index') -> name('opervalor.index');
    $this->post('/ListValor', 'TipoVeiculoController@show') -> name('opervalor.show');

    $this->get('/ListVaga', 'VagaController@index') -> name('opervaga.index');
    $this->post('/ListVaga', 'VagaController@show') -> name('opervaga.show');
});

Auth::routes();
