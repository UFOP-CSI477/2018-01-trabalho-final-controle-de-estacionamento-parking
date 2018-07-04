<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoVeiculo;
use Illuminate\Support\Facades\DB;

class TipoVeiculoController extends Controller
{
    public function index()
    {
        $valores = TipoVeiculo::orderBy('tipo')->get();
        return view('oper.tipo_veiculo.index') -> with('valores',$valores);;
    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $valores = DB::table('tipo_veiculos')
                        ->select('*')
                        ->where('tipo', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('tipo')
                        ->get();
            return view('oper.tipo_veiculo.index') -> with('valores',$valores);
        }else{
            $valores = TipoVeiculo::orderBy('tipo')->get();
            return view('oper.tipo_veiculo.index') -> with('valores',$valores);
        }
    }
}
