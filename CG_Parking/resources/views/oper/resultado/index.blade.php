@extends('adminlte::page')

@section('title', 'Resultado CG Parking')

@section('content_header')
<h1>
        Fatura
        <small>#{{$valor->id}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fatura</li>
      </ol>
@stop

@section('content')
<!-- title row -->
 <div class="row">
   <div class="col-xs-12">
     <h2 class="page-header">
       <i class="fa fa-globe"></i> CG Parking, Inc.
       <small class="pull-right">Data/Hora: <?php echo date("d/m/Y H:i:s ",strtotime($valor -> created_at)) ?></small>
     </h2>
   </div>
   <!-- /.col -->
 </div>
 <!-- info row -->
 <div class="row invoice-info">
   <div class="col-sm-4 invoice-col">
     De
     <address>
       <strong>CG Parking, Inc.</strong><br>
       Endereço: Rua Esmeralda, 600<br>
                 João Monlevade, MG<br>
       Telefone: (31) 1234-5432<br>
       Email: cgparking@gmail.com
     </address>
   </div>
   <!-- /.col -->
   <div class="col-sm-4 invoice-col">
     Para
     <address>
       <strong>{{$user2->name or 'Cliente Não Cadastrado'}}</strong><br>
       Endereço: {{$user2->endereco or ''}}<br>
       E-mail: {{$user2->email or ''}}<br>
       Dono do Veículo de:<br>
       Placa: {{$entrada->placa}}
     </address>
   </div>
   <!-- /.col -->
   <div class="col-sm-4 invoice-col">
     <b>Fatura #{{$valor->id}}</b><br>
     <br>
     <b>Order ID:</b> {{$valor->id}}<br>
     <b>Payment Due: </b><?php echo date("d/m/Y",strtotime($valor -> created_at)) ?> <br>
     <b>Account:</b> 968-34567
   </div>
   <!-- /.col -->
 </div>
 <!-- /.row -->

 <!-- Table row -->
 <div class="row">
   <div class="col-xs-12 table-responsive">
     <table class="table table-striped">
       <thead>
           <caption>Entrada ao CG Parking</caption>
       <tr>
         <th>Placa</th>
         <th>Modelo</th>
         <th>Cor</th>
         <th>Ano</th>
         <th>Vaga</th>
         <th>Horário</th>
       </tr>
       </thead>
       <tbody>
       <tr>
         <td>{{$entrada->placa}}</td>
         <td>{{$entrada->modelo}}</td>
         <td>{{$entrada->cor}}</td>
         <td>{{$entrada->ano}}</td>
         <td>{{$vaga->nome}}</td>
         <td>{{$entrada->created_at}}</td>
       </tr>
       </tbody>
     </table>
     <table class="table table-striped">
       <thead>
           <caption>Saida do CG Parking</caption>
       <tr>
         <th>Horário</th>
       </tr>
       </thead>
       <tbody>
       <tr>
         <td>{{$saida->created_at}}</td>
       </tr>
       </tbody>
     </table>
 </table>
 <table class="table table-striped">
   <thead>
       <caption>Tipo de Veículo Usado</caption>
   <tr>
     <th>Tipo de Veículo</th>
     <th>Valor cobrado por hora desse tipo de veículo</th>
   </tr>
   </thead>
   <tbody>
   <tr>
     <td>{{$tipoveiculo->tipo}}</td>
     <td>R$ {{$tipoveiculo->valor_por_hora}}</td>
   </tr>
   </tbody>
 </table>
 <table class="table table-striped">
   <thead>
       <caption>Dados do atendente</caption>
   <tr>
     <th>Nome</th>
     <th>E-mail para contato</th>
   </tr>
   </thead>
   <tbody>
   <tr>
     <td>{{$user->name}}</td>
     <td>{{$user->email}}</td>
   </tr>
   </tbody>
 </table>
   </div>
   <!-- /.col -->
 </div>
 <!-- /.row -->

 <div class="row">
   <!-- accepted payments column -->
   <div class="col-xs-6">
     <p class="lead">Payment Methods:</p>
     <img src="{!! asset('images/visa.png') !!}" alt="Visa">
     <img src="{!! asset('images/mastercard.png') !!}" alt="Mastercard">
     <img src="{!! asset('images/american-express.png') !!}" alt="American Express">
     <img src="{!! asset('images/paypal2.png') !!}" alt="Paypal">

   </div>
   <!-- /.col -->
   <div class="col-xs-6">
     <p class="lead">Valor gerado <?php echo date("d/m/Y",strtotime($valor -> created_at)) ?></p>

     <div class="table-responsive">
       <table class="table">
         <tr>
           <th>Total:</th>
           <td>R$ {{$valor->valor}}</td>
         </tr>
       </table>
     </div>
   </div>
   <!-- /.col -->
 </div>
 <!-- /.row -->

 <!-- this row will not appear when printing -->
 <div class="row no-print">
   <div class="col-xs-12">
     <button onclick="window.print()" target="_blank" class="btn bg-maroon btn-flat pull-right"  style="width: 200px;"><i class="fa fa-print"></i> Imprimir</a>
     <button onclick = "window.print()" type="button" class="btn btn-flat bg-orange pull-right" style="margin-right: 5px;width: 200px;">
       <i class="fa fa-download"></i> Gerar PDF
     </button>
   </div>
 </div>
@stop
