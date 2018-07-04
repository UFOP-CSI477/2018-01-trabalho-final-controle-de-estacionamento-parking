<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Entrada;

class EntradaController extends Controller
{

    public function index(){
        $vagas = DB::select('select * from vagas where estado = "Liberado"');
        $tipo =  DB::select('select * from tipo_veiculos');

        return view('oper.entrada.index',['vagas' => $vagas , 'tipo' => $tipo]);
    }

    public function store(Request $request)
    {
        $entradas2 = DB::select('select entradas.placa from entradas where entradas.id not in (select saidas.entrada_id from saidas)');
        foreach ($entradas2 as $e) {
            if($e->placa == $request->placa){
                session()->flash('mensagem_error_placa', 'Erro ao registrar entrada de veículo!');
                return redirect()->route('entrada.index');
            }
        }

        $entrada = new Entrada();
        $entrada -> placa = $request->placa;
        $entrada -> tipo_veiculo_id = $request->tipo_veiculo_id;
        $entrada -> modelo = $request->modelo;
        $entrada -> cor = $request->cor;
        $entrada -> ano = $request->ano;
        $entrada -> vaga_id = $request->vaga_id;
        $entrada -> user_id_oper = auth()->user()->id;

        try{
            $entrada -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_error', 'Erro ao registrar entrada de veículo!');
            return redirect()->route('entrada.index');
        }

        DB::update('update vagas set estado = "Ocupado" where id = ?', [$request->vaga_id]);

        session()->flash('mensagem', 'Entrada de veículo registrada com sucesso!');
        return redirect()->route('entrada.index');
    }

    public function index2(){
        $vagas = DB::select('select * from vagas where estado = "Liberado"');
        $tipo =  DB::select('select * from tipo_veiculos');
        $user =  DB::select('select * from users where nivel = "Usuário" order by name');


        return view('oper.entrada.indexregistered',['vagas' => $vagas , 'tipo' => $tipo , 'user' => $user]);
    }

    public function store2(Request $request)
    {
        $entradas2 = DB::select('select entradas.placa from entradas where entradas.id not in (select saidas.entrada_id from saidas)');
        foreach ($entradas2 as $e) {
            if($e->placa == $request->placa){
                session()->flash('mensagem_error_placa', 'Erro ao registrar entrada de veículo!');
                return redirect()->route('entradas.index');
            }
        }
        if($request->cliente == "0"){
            session()->flash('mensagem_error_cliente', 'Erro ao registrar entrada de veículo!');
            return redirect()->route('entradas.index');
        }

        $entrada = new Entrada();
        $entrada -> user_id_user = $request->cliente;
        $entrada -> placa = $request->placa;
        $entrada -> tipo_veiculo_id = $request->tipo_veiculo_id;
        $entrada -> modelo = $request->modelo;
        $entrada -> cor = $request->cor;
        $entrada -> ano = $request->ano;
        $entrada -> vaga_id = $request->vaga_id;
        $entrada -> user_id_oper = auth()->user()->id;

        try{
            $entrada -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_error', 'Erro ao registrar entrada de veículo!');
            return redirect()->route('entradas.index');
        }

        DB::update('update vagas set estado = "Ocupado" where id = ?', [$request->vaga_id]);

        session()->flash('mensagem', 'Entrada de veículo registrada com sucesso!');
        return redirect()->route('entradas.index');
    }

    public function show2(Request $request){
        if($request -> table_search != ""){
            $vagas = DB::select('select * from vagas where estado = "Liberado"');
            $tipo =  DB::select('select * from tipo_veiculos');
            $user = DB::table('users')
                        ->select('*')
                        ->where('nivel', '=', 'Usuário')
                        ->where('name', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('name')
                        ->get();
            return view('oper.entrada.indexregistered',['vagas' => $vagas , 'tipo' => $tipo , 'user' => $user]);
        }else{
            return redirect()->route('entradas.index');
        }
    }

}
