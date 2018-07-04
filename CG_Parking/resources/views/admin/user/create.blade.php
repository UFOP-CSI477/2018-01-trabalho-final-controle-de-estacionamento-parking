@extends('adminlte::page')

@section('title', 'User Create CG Parking')

@section('content_header')
    <h1><strong>CADASTRAR USUÁRIO AO CG PARKING</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href="{{ route('user.index') }}"><strong>Usuários</strong></a></li>
        <li><a href="{{ route('vaga.create') }}"><strong>Cadastrar</strong></a></li>
    </ol>
@stop

@section('content')
@if (session('mensagem_error_vazio'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error_vazio') }}</h4>
            Causa: Um ou mais campos não preenchidos, por favor preencha todos os campos!
    </div>

@endif
@if (session('mensagem_error'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error') }}</h4>
            Causa: E-mail ou CPF já cadastrados no sistema.
    </div>

@endif
@if (session('mensagem_success'))

    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('mensagem_success') }}</h4>
    </div>

@endif
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Cadastrar Usuário</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="{{ route('user.store') }}">
            {!! csrf_field ()!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" maxlength="100" class="form-control" name="nome" placeholder="Digite o nome do usuário" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" maxlength="100" class="form-control" name="endereco" placeholder="Digite o endereço do usuário" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" maxlength="11" class="form-control" name="cpf" placeholder="Digite o CPF do usuário" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" maxlength="50" class="form-control" name="email" placeholder="Digite o e-mail do usuário" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" maxlength="15" class="form-control" name="telefone" placeholder="Digite o telefone do usuário" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="text" maxlength="191" class="form-control" name="senha" placeholder="Digite a senha do usuário" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nivel">Nivel</label>
                        <select name="nivel" class="form-control">
                            <option value="0">Selecione:</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Operador">Operador</option>
                            <option value="Usuário">Usuário</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-block btn-flat"><strong>Cadastrar</strong></button>
                        </div>
                        <div class="col-md-9">
                        </div>
                    </div>
                    <br><br>

                </div>
            </form>
    </div>
    <!-- /.box-body -->
</div>

@stop
