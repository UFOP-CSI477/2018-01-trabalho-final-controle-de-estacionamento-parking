@extends('adminlte::page')

@section('title', 'Valores CG Parking')

@section('content_header')
<h1><strong>LISTA DE VALORES DO CG PARKING</strong></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
    <li><a href="{{ route('uservalor.index') }}"><strong>Valores</strong></a></li>
    <li><a href="{{ route('uservalor.index') }}"><strong>Visualizar</strong></a></li>
</ol>
@stop

@section('content')
<form method="POST" action="{{ route('uservalor.show') }}">
     {!! csrf_field ()!!}
<div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Valores Cobrados Pelo CG Parking</strong></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">

                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar por tipo de veículo">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                        </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered table-striped">
                <tbody><tr>
                    <th>Tipo de Veículo</th>
                    <th>Valor por hora</th>
                @foreach($valores as $e)
                <tr>
                      <td>{{$e -> tipo}}</td>
                      <td>R$ {{$e -> valor_por_hora}}</td>
                </tr>
                @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </form>

@stop
