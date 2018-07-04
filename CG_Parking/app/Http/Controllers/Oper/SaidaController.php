<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Saida;
use App\Valor;


class SaidaController extends Controller
{
    public function index(){
        $entradas = DB::select('select tipo_veiculos.tipo , entradas.* from entradas , tipo_veiculos  where tipo_veiculos.id = entradas.tipo_veiculo_id and entradas.id not in (select saidas.entrada_id from saidas)');

        return view('oper.saida.index',['entradas' => $entradas]);
    }

    public function store(Request $request)
    {

        $saida = new Saida();
        $saida -> entrada_id = $request -> entrada_id;
        try{
            $saida -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_error', 'Erro ao registrar saída de veículo!');
            return redirect()->route('saida.index');
        }


        DB::update('update vagas set estado = "Liberado" where id = (select entradas.vaga_id from entradas where id = ? )', [$request -> entrada_id]);

        $entrada_created_at = DB::select('select entradas.created_at from entradas where entradas.id = ? ' , [$saida -> entrada_id]);
        $valor_tipo_veiculo = DB::select('select tipo_veiculos.valor_por_hora from tipo_veiculos where tipo_veiculos.id = (select entradas.tipo_veiculo_id from entradas where id = ?) ' , [$saida -> entrada_id]);

        $val = (strtotime($saida -> created_at) - strtotime($entrada_created_at[0] -> created_at)) * ($valor_tipo_veiculo[0]->valor_por_hora / 3600);
        $val = number_format($val, 2, '.', '');

        $valor = new Valor();
        $valor -> saida_id = $saida -> id;
        $valor -> valor = $val;
        $valor -> save();

        session()->flash('mensagem', 'Saida de veículo registrada com sucesso!');
        return redirect()->route('result.index' , $valor->id);
    }
}
