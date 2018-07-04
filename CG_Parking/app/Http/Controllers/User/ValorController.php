<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TipoVeiculo;

class ValorController extends Controller
{
    public function index()
    {
        $valores = TipoVeiculo::orderBy('tipo')->get();
        return view('user.valor.index') -> with('valores',$valores);;
    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $valores = DB::table('tipo_veiculos')
                        ->select('*')
                        ->where('tipo', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('tipo')
                        ->get();
            return view('user.valor.index') -> with('valores',$valores);
        }else{
            $valores = TipoVeiculo::orderBy('tipo')->get();
            return view('user.valor.index') -> with('valores',$valores);
        }
    }
}
