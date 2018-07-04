@extends('adminlte::page')

@section('title', 'Saida CG Parking')

@section('content_header')
<h1><strong>MARCAR SAIDA DO CLIENTE AO ESTACIONAMENTO</strong></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
    <li><a href="{{ route('entrada.index') }}"><strong>Saída de Veículo</strong></a></li>
</ol>
@stop

@section('content')
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Registrar saída</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="{{ route('saida.store') }}">
            {!! csrf_field ()!!}
              <div class="box-body">
                <div class="form-group">
                    <label for="entrada_id">Entrada realizada</label>
                    <select name="entrada_id" class="form-control">
                        <option value="0">Selecione:</option>
                        @foreach($entradas as $e)
                                <option value="{{$e -> id}}">Placa:  {{$e -> placa}}, Tipo de Veículo:  {{$e-> tipo}}, Modelo:  {{$e -> modelo}}, Cor:  {{$e -> cor}}, Ano:  {{$e -> ano}}</option>
                        @endforeach
                    </select>
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
@if (session('mensagem_error'))

<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error') }}</h4>
        Causa: Não selecionou o campo de entrada.
</div>

@endif
@if (session('mensagem_error_valor'))

<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_error_valor') }}</h4>
        Impossível acessar esta página com este id.
</div>

@endif

<!-- /.box -->
@stop
