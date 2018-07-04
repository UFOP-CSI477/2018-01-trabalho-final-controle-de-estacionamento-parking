@extends('adminlte::page')

@section('title', 'Valores Create Create CG Parking')

@section('content_header')
    <h1><strong>INSERIR VALOR AO CG PARKING</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href="{{ route('valor.index') }}"><strong>Valores</strong></a></li>
        <li><a href="{{ route('valor.create') }}"><strong>Inserir</strong></a></li>
    </ol>
@stop

@section('content')
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Inserir Valor</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="{{ route('valor.store') }}">
            {!! csrf_field ()!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tipo">Tipo de Veículo</label>
                        <input type="text" maxlength="50" class="form-control" name="tipo" placeholder="Digite o tipo de veículo" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor por hora</label>
                        <input type="text" class="form-control" name="valor" placeholder="Digite o valor por hora à ser cobrado pelo tipo de veículo" required>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-block btn-flat"><strong>Inserir</strong></button>
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
@if (session('mensagem_error_vazio'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error_vazio') }}</h4>
            Causa: Nome vazio, por favor insira valores aos campos!
    </div>

@endif
@if (session('mensagem_error'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error') }}</h4>
            Causa: Nome já cadastrado no sistema ou campo de valor preenchido com valor não numérico.
    </div>

@endif
@if (session('mensagem_success'))

    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('mensagem_success') }}</h4>
    </div>

@endif
@stop
