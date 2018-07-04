<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;
use Illuminate\Support\Facades\DB;

class VagaController extends Controller
{
    public function index()
    {
        $vagas = Vaga::orderBy('nome')->get();
        return view('oper.vaga.index') -> with('vagas',$vagas);
    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $vagas = DB::table('vagas')
                        ->select('*')
                        ->where('nome', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('nome')
                        ->get();
            return view('oper.vaga.index') -> with('vagas',$vagas);
        }else{
            $vagas = Vaga::orderBy('nome')->get();
            return view('oper.vaga.index') -> with('vagas',$vagas);
        }
    }
}
