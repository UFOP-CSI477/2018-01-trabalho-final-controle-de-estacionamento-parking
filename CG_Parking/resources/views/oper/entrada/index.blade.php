@extends('adminlte::page')

@section('title', 'Entrada CG Parking')

@section('content_header')
<h1><strong>MARCAR ENTRADA DO CLIENTE AO ESTACIONAMENTO</strong></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
    <li><a href="{{ route('entrada.index') }}"><strong>Entrada de Veículo</strong></a></li>
    <li><a href="{{ route('entrada.index') }}"><strong>Cliente Não Cadastrado</strong></a></li>
</ol>
@stop

@section('content')
@if (session('mensagem_error_placa'))

<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error_placa') }}</h4>
        Placa de veículo já se encontra neste estacionamento.
</div>

@endif
@if (session('mensagem'))

<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>{{ session('mensagem') }}</h4>
        Foi cadastrado a entrada do veículo com sucesso.
</div>

@endif
@if (session('mensagem_error'))

<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error') }}</h4>
        Causa: Campos vazios, por favor preencha todos os campos.
</div>

@endif

<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Registrar entrada</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="{{ route('entrada.store') }}">
            {!! csrf_field ()!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="placa">Placa do Veículo</label>
                        <input type="text" maxlength="8"class="form-control" name="placa" placeholder="Digite a placa do veículo" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_veiculo">Tipo do Veículo</label>
                        <select name="tipo_veiculo_id" class="form-control">
                                <option value="0">Selecione:</option>
                            @foreach($tipo as $f)
                                <option value="{{$f -> id}}">Tipo de Veículo:  {{$f -> tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vaga_id">Vaga do Estacionamento</label>
                        <select name="vaga_id" class="form-control">
                            <option value="0">Selecione:</option>
                            @foreach($vagas as $e)
                                <option value="{{$e -> id}}">Nome da vaga: {{$e -> nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo do Veículo</label>
                        <input type="text"  maxlength="20" class="form-control" name="modelo" placeholder="Digite o modelo do veículo - (NÃO OBRIGATÓRIO)">
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor do Veículo</label>
                        <input type="text" maxlength="20" class="form-control" name="cor" placeholder="Digite a cor do veículo - (NÃO OBRIGATÓRIO)">
                    </div>
                    <div class="form-group">
                        <label for="ano">Ano do Veículo</label>
                        <input type="text" maxlength="4" class="form-control" name="ano" placeholder="Digite o ano do veículo - (NÃO OBRIGATÓRIO)">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-block btn-flat"><strong>Registrar</strong></button>
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

<!-- /.box -->
@stop
