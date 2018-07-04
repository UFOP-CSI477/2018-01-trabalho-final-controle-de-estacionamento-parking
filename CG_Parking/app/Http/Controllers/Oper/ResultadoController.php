<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Vaga;
use App\Valor;
use App\Entrada;
use App\Saida;
use App\TipoVeiculo;
use App\User;

class ResultadoController extends Controller
{
    public function index($id){
        $valor = Valor::find($id);
        if($valor == null){
            session()->flash('mensagem_error_valor', 'ID Inválido!');
            return redirect()->route('saida.index');
        }
        $saida = Saida::find($valor->saida_id);
        $entrada = Entrada::find($saida->entrada_id);
        $vaga = Vaga::find($entrada->vaga_id);
        $tipoveiculo = TipoVeiculo::find($entrada->tipo_veiculo_id);
        $user = User::find($entrada->user_id_oper);
        if($entrada -> user_id_user != null){
            $user2 = User::find($entrada->user_id_user);
        }else{
            $user2 = null;
        }
        return view('oper.resultado.index',['valor' => $valor , 'saida' => $saida ,'entrada' => $entrada ,'tipoveiculo' => $tipoveiculo ,'user' => $user, 'vaga' => $vaga , 'user2' => $user2] );
    }

    public function index2(){
        $resultado = DB::select('select valors.id ,user.name as nameuser, entradas.placa,tipo_veiculos.tipo,tipo_veiculos.valor_por_hora,entradas.modelo,entradas.cor,entradas.ano,users.name,vagas.nome,entradas.created_at as created_at_entrada,saidas.created_at as created_at_saida,valors.valor from entradas,saidas,valors,users,users as user,tipo_veiculos,vagas where valors.saida_id = saidas.id and saidas.entrada_id = entradas.id and entradas.tipo_veiculo_id = tipo_veiculos.id and entradas.user_id_oper = users.id and entradas.vaga_id = vagas.id and entradas.user_id_user = user.id order by user.name , entradas.placa');
        $resultado2 = DB::select('select valors.id , entradas.placa,tipo_veiculos.tipo,tipo_veiculos.valor_por_hora,entradas.modelo,entradas.cor,entradas.ano,users.name,vagas.nome,entradas.created_at as created_at_entrada,saidas.created_at as created_at_saida,valors.valor from entradas,saidas,valors,users,tipo_veiculos,vagas where valors.saida_id = saidas.id and saidas.entrada_id = entradas.id and entradas.tipo_veiculo_id = tipo_veiculos.id and entradas.user_id_oper = users.id and entradas.vaga_id = vagas.id and entradas.user_id_user is null order by entradas.placa');
        return view('oper.resultado.segundavia',['resultado' => $resultado , 'resultado2' => $resultado2]);
    }

    public function show(Request $request){
        if($request -> table_search != ""){
            $like = "%".$request->table_search."%";
            $resultado = DB::select('select valors.id , user.name as nameuser, entradas.placa,tipo_veiculos.tipo,tipo_veiculos.valor_por_hora,entradas.modelo,entradas.cor,entradas.ano,users.name,vagas.nome,entradas.created_at as created_at_entrada,saidas.created_at as created_at_saida,valors.valor from entradas,saidas,valors,users,users as user,tipo_veiculos,vagas where valors.saida_id = saidas.id and saidas.entrada_id = entradas.id and entradas.tipo_veiculo_id = tipo_veiculos.id and entradas.user_id_oper = users.id and entradas.vaga_id = vagas.id and entradas.user_id_user = user.id and entradas.placa like ? order by user.name , entradas.placa',[$like]);
            $resultado2 = DB::select('select valors.id , entradas.placa,tipo_veiculos.tipo,tipo_veiculos.valor_por_hora,entradas.modelo,entradas.cor,entradas.ano,users.name,vagas.nome,entradas.created_at as created_at_entrada,saidas.created_at as created_at_saida,valors.valor from entradas,saidas,valors,users,tipo_veiculos,vagas where valors.saida_id = saidas.id and saidas.entrada_id = entradas.id and entradas.tipo_veiculo_id = tipo_veiculos.id and entradas.user_id_oper = users.id and entradas.vaga_id = vagas.id and entradas.user_id_user is null and entradas.placa like ? order by entradas.placa',[$like]);
            return view('oper.resultado.segundavia',['resultado' => $resultado , 'resultado2' => $resultado2]);
        }else{
            return redirect()->route('resultado.index');
        }
    }
}
