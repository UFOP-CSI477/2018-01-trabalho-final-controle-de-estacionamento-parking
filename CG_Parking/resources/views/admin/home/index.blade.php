@extends('adminlte::page')

@section('title', 'Home CG Parking')

@section('content_header')
<div class="row">
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$valor[0]->valortotal}}</h3>

          <p>Atendimentos concluídos</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$vagas[0]->vagatotal}}</h3>

          <p>Vagas Livres no CG Parking</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>

      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$user[0]->usertotal}}</h3>

          <p>Usuários Cadastrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>

      </div>
    </div>
    <!-- ./col -->
</div>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-danger">
              <div class="box-header with-border">
                  <h3><strong><center>Seja Bem-Vindo</center></strong></h3>
              </div>
            <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <h4><strong><center>Bem-vindo ao melhor e maior parking da cidade<br>Bem-Vindo ao CG Parking</center></strong></h4>
                </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
</div>
@stop
