@extends('adminlte::page')

@section('title', 'Perfil CG Parking')

@section('content_header')
    <h1><strong>DADOS DO PERFIL</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href=""><strong>Perfil</strong></a></li>
    </ol>
@stop

@section('content')
@if (session('mensagem_edit_error'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_edit_error') }}</h4>
    </div>

@endif
@if (session('mensagem_edit_error_vazio'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_edit_error_vazio') }}</h4>
            Por favor preencha todos os campos.
    </div>

@endif

@if (session('mensagem_edit_success'))

    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('mensagem_edit_success') }}</h4>
    </div>

@endif
@if (session('mensagem_senha_success'))

    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('mensagem_senha_success') }}</h4>
    </div>

@endif
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Perfil do Administrador</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <h4><strong>Nome: </strong>{{$user->name}}</h4>
        <h4><strong>E-mail: </strong>{{$user->email}}</h4>
        <h4><strong>CPF: </strong>{{$user->cpf}}</h4>
        <h4><strong>Endereço: </strong>{{$user->endereco}}</h4>
        <h4><strong>Telefone: </strong>{{$user->telefone}}</h4>

    </div>
    <!-- /.box-body -->
    <div class="box-foot">
        <button type="button" style="width:250px"class="btn bg-purple margin" onclick="window.location='{{ route('user.editt') }}'">Editar - <i class="fa fa-edit"></i></button>
    </div>
</div>


@stop
