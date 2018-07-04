@extends('adminlte::page')

@section('title', 'Valores CG Parking')

@section('content_header')
<h1><strong>LISTA DE VALORES DO CG PARKING</strong></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
    <li><a href="{{ route('valor.index') }}"><strong>Valores</strong></a></li>
    <li><a href="{{ route('valor.index') }}"><strong>Visualizar</strong></a></li>
</ol>
@stop

@section('content')
@if (session('mensagem_edit_error'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_edit_error') }}</h4>
            Causa: Nome vazio, por favor insira um nome à vaga!
    </div>

@endif
@if (session('mensagem_edit_error_id'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_edit_error_id') }}</h4>
            Por favor acesse um id válido para ter acesso a página de edição!
    </div>

@endif
@if (session('mensagem_delete_error_id'))

    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>{{ session('mensagem_delete_error_id') }}</h4>
            Por favor acesse um id válido para realizar a exclusão!
    </div>

@endif
@if (session('mensagem_edit_success'))

    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('mensagem_edit_success') }}</h4>
    </div>

@endif
@if (session('mensagem_delete_success'))

    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('mensagem_delete_success') }}</h4>
    </div>

@endif
<form method="POST" action="{{ route('valor.show') }}">
     {!! csrf_field ()!!}
<div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Tabela de Dados de Valores Cadastrados</strong></h3>

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
                    <th>ID</th>
                    <th>Tipo de Veículo</th>
                    <th>Valor por hora</th>
                    <th>Criado em</th>
                    <th>Editado em</th>
                    <th>Editar Vaga</th>
                    <th>Excluir Vaga</th>
                </tr>
                @foreach($valores as $e)
                <tr>
                      <td>{{$e -> id}}</td>
                      <td>{{$e -> tipo}}</td>
                      <td>R$ {{$e -> valor_por_hora}}</td>
                      <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> created_at)) ?></td>
                      <td><?php echo date("d/m/Y H:i:s ",strtotime($e -> updated_at)) ?></td>
                      <td><button type="button" class="btn bg-purple margin" onclick="window.location='{{ route('valor.edit', [ 'id' => $e -> id ]) }}'">Editar - <i class="fa fa-edit"></i></button> </td>
                      <td><button type="button" class="btn btn-danger margin" onclick="window.location='{{ route('valor.destroy', $e -> id) }}'">Excluir - <i class="fa fa-trash"></i></button> </td>
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
