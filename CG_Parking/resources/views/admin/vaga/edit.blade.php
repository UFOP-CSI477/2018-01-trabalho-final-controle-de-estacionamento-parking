@extends('adminlte::page')

@section('title', 'Vaga Edit CG Parking')

@section('content_header')
    <h1><strong>EDITAR VAGA DO CG PARKING</strong></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home.home') }}"><strong>Home</strong></a></li>
        <li><a href="{{ route('vaga.index') }}"><strong>Vagas</strong></a></li>
        <li><a href=""><strong>Editar</strong></a></li>
    </ol>
@stop

@section('content')
<div class="box box-solid box-info">
    <div class="box-header with-border">
        <h1 class="box-title"><strong>Editar Vaga</strong></h1>
    </div>
<!-- /.box-header -->
    <div class="box-body">
       <form role="form" method="POST" action="{{ route('vaga.update',  $vaga->id ) }}">
            {!! csrf_field ()!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id">ID da Vaga</label>
                        <input type="text" class="form-control" name="id" value="{{$vaga->id}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado da Vaga</label>
                        <input type="text" class="form-control" name="estado" value="{{$vaga->estado}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome da Vaga</label>
                        <input type="text" maxlength="3" class="form-control" name="nome" placeholder="Digite o nome da vaga" value="{{$vaga->nome}}" required>
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
