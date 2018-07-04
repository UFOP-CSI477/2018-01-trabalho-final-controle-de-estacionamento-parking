@extends('adminlte::page')

@section('title', 'User Edit CG Parking')

@section('content_header')
    <h1><strong>EDITAR PERFIL</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href="{{ route('user.showw') }}"><strong>Perfil</strong></a></li>
        <li><a href="#"><strong>Editar</strong></a></li>
    </ol>
@stop

@section('content')
@if (session('mensagem_edit_error_vazio'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_edit_error_vazio') }}</h4>
            Causa: Um ou mais campos não preenchidos, por favor preencha todos os campos!
    </div>

@endif
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Editar Perfil de Administrador</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
       <form role="form" method="POST" action="{{ route('user.updatee') }}">
            {!! csrf_field ()!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" name="id" value="{{$user->id}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" maxlength="100" class="form-control" name="name" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" maxlength="11" class="form-control" name="cpf" value="{{$user->cpf}}" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" maxlength="100" class="form-control" name="endereco" value="{{$user->endereco}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" maxlength="50" class="form-control" name="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" maxlength="15" class="form-control" name="telefone" value="{{$user->telefone}}" required>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-block btn-flat"><strong>Editar</strong></button>
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
