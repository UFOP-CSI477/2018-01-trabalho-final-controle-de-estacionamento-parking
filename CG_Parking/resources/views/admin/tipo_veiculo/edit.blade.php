@extends('adminlte::page')

@section('title', 'Valor Edit CG Parking')

@section('content_header')
    <h1><strong>EDITAR VALOR DO CG PARKING</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href="{{ route('valor.index') }}"><strong>Valores</strong></a></li>
        <li><a href=""><strong>Editar</strong></a></li>
    </ol>
@stop

@section('content')
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Editar Valor</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="{{ route('valor.update', $valor->id ) }}">
            {!! csrf_field ()!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id">ID do Valor</label>
                        <input type="text" class="form-control" name="id" value="{{$valor->id}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo de Veiculo</label>
                        <input type="text" maxlength="50" class="form-control" name="tipo" placeholder="Digite o tipo de veículo" value="{{$valor->tipo}}" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor por Hora</label>
                        <input type="text" class="form-control" name="valor" placeholder="Digite o valor a ser cobrado pelo tipo de veículo" value="{{$valor->valor_por_hora}}" required>
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
