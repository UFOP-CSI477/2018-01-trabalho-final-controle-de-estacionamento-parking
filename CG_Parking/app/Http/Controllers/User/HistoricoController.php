<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{
    public function index(){
        $resultado = DB::select('select  entradas.placa,tipo_veiculos.tipo,tipo_veiculos.valor_por_hora,entradas.modelo,entradas.cor,entradas.ano,users.name,vagas.nome,entradas.created_at as created_at_entrada,saidas.created_at as created_at_saida,valors.valor from entradas,saidas,valors,users,users as user,tipo_veiculos,vagas where valors.saida_id = saidas.id and saidas.entrada_id = entradas.id and entradas.tipo_veiculo_id = tipo_veiculos.id and entradas.user_id_oper = users.id and entradas.vaga_id = vagas.id and entradas.user_id_user = user.id and user.id = ? order by user.name , entradas.placa',[auth()->user()->id]);
        return view('user.historico.index',['resultado' => $resultado]);
    }

    public function show(Request $request){
        if($request -> table_search != ""){
            $like = "%".$request->table_search."%";
            $resultado = DB::select('select user.name as nameuser, entradas.placa,tipo_veiculos.tipo,tipo_veiculos.valor_por_hora,entradas.modelo,entradas.cor,entradas.ano,users.name,vagas.nome,entradas.created_at as created_at_entrada,saidas.created_at as created_at_saida,valors.valor from entradas,saidas,valors,users,users as user,tipo_veiculos,vagas where valors.saida_id = saidas.id and saidas.entrada_id = entradas.id and entradas.tipo_veiculo_id = tipo_veiculos.id and entradas.user_id_oper = users.id and entradas.vaga_id = vagas.id and entradas.user_id_user = user.id and user.id = ? and entradas.placa like ? order by user.name , entradas.placa',[auth()->user()->id,$like]);
            return view('user.historico.index',['resultado' => $resultado]);
        }else{
            return redirect()->route('historico.index');
        }
    }
}
