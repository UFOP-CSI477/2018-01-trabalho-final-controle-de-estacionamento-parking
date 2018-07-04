@extends('adminlte::page')

@section('title', 'Vaga CG Parking')

@section('content_header')
<h1><strong>VAGAS DO CG PARKING</strong></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
    <li><a href=""><strong>Vagas</strong></a></li>
    <li><a href="{{ route('uservaga.index') }}"><strong>Visualizar</strong></a></li>
</ol>
@stop

@section('content')
<form method="POST" action="{{ route('uservaga.show') }}">
     {!! csrf_field ()!!}
<div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><strong>Número Vagas do CG Parking</strong></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                  <table class="table table-hover table-bordered table-striped">
                      <tfoot>
                            <tr class="">
                                <td colspan="2">Vagas do CG Parking:</td>
                                <td colspan="2">{{$countvagas[0]->vagatotal}}</td>
                            </tr>
                            <tr class="bg-olive">
                                <td colspan="2">Vagas Livres do CG Parking:</td>
                                <td colspan="2">{{$countvagasliberado[0]->vagatotal}}</td>
                            </tr>
                            <tr class="bg-maroon">
                                <td colspan="2">Ocupadas do CG Parking:</td>
                                <td colspan="2">{{$countvagasocupado[0]->vagatotal}}</td>
                            </tr>
                        </tfoot>

                  </table>
              </div>
              <!-- /.box-body -->
            </div>
          <div class="box box-solid box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Listagem de Vagas do CG Parking</strong></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 180px;">

                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar por Nome da Vaga">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                        </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered table-striped">
                <tbody>
                <tr>
                    <th>Nome</th>
                    <th>Estado</th>
                </tr>
                @foreach($vagas as $e)
                <tr>
                      <td>{{$e -> nome}}</td>
                      <?php if($e -> estado == "Liberado"){
                          echo "<td><span class='label label-success'>{$e -> estado}</span></td>";
                      }else{
                          echo "<td><span class='label label-danger'>{$e -> estado}</span></td>";
                      };?>
                </tr>
                @endforeach

              </tbody>
          </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </form>

@stop
