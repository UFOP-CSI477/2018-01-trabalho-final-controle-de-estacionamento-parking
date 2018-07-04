@extends('adminlte::page')

@section('title', 'Valores CG Parking')

@section('content_header')
<h1><strong>RELATÓRIO OPERACIONAL DO CG PARKING</strong></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
    <li><a href=""><strong>Relatorios</strong></a></li>
    <li><a href="{{ route('relatoriovalor.index') }}"><strong>Operacional</strong></a></li>
</ol>
@stop

@section('content')
<form method="POST" action="{{ route('relatoriovalor.show') }}">
     {!! csrf_field ()!!}
<div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Relatório de estacionamentos concluídos</strong></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 180px;">

                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar por placa">

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
                    <th>Placa</th>
                    <th>Nome Cliente</th>
                    <th>Tipo de Veículo</th>
                    <th>Valor por hora</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Ano</th>
                    <th>Atendente</th>
                    <th>Vaga</th>
                    <th>Data/Hora de Entrada</th>
                    <th>Data/Hora de Saída</th>
                    <th>Valor Cobrado</th>
                </tr>
                @foreach($resultado as $e)
                <tr>
                      <td>{{$e -> placa}}</td>
                      <td>{{$e -> nameuser}}</td>
                      <td>{{$e -> tipo}}</td>
                      <td>R$ {{$e -> valor_por_hora}}</td>
                      <td>{{$e -> modelo}}</td>
                      <td>{{$e -> cor}}</td>
                      <td>{{$e -> ano}}</td>
                      <td>{{$e -> name}}</td>
                      <td>{{$e -> nome}}</td>
                      <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at_entrada)) ?></td>
                      <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at_saida)) ?></td>
                      <td>R$ {{$e -> valor}}</td>
                </tr>
                @endforeach
                @foreach($resultado2 as $e)
                <tr>
                      <td>{{$e -> placa}}</td>
                      <td>Cliente Não Cadastrado</td>
                      <td>{{$e -> tipo}}</td>
                      <td>R$ {{$e -> valor_por_hora}}</td>
                      <td>{{$e -> modelo}}</td>
                      <td>{{$e -> cor}}</td>
                      <td>{{$e -> ano}}</td>
                      <td>{{$e -> name}}</td>
                      <td>{{$e -> nome}}</td>
                      <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at_entrada)) ?></td>
                      <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at_saida)) ?></td>
                      <td>R$ {{$e -> valor}}</td>
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
