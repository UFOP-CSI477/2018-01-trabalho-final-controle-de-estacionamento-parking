@extends('adminlte::page')

@section('title', 'User Create CG Parking')

@section('content_header')
    <h1><strong>Mudar Senha</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href="{{ route('user.showw') }}"><strong>Perfil</strong></a></li>
        <li><a href="#"><strong>Mudar Senha</strong></a></li>
    </ol>
@stop

@section('content')
@if (session('mensagem_senha_error'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_senha_error') }}</h4>
            Campos de senhas com valores diferentes.
    </div>

@endif
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Mudar Senha de Perfil</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="{{ route('user.updatepassword') }}">
            {!! csrf_field ()!!}

                <div class="box-body">
                    <div class="form-group">
                        <label for="newsenha">Nova Senha</label>
                        <input type="password" maxlength="100" class="form-control" name="newsenha" placeholder="Digite a nova senha" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="confirmsenha">Confirmar Senha</label>
                        <input type="password" maxlength="100" class="form-control" name="confirmsenha" placeholder="Digite a nova senha" required>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-block btn-flat"><strong>Mudar</strong></button>
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
