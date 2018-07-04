<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vaga;
use Illuminate\Support\Facades\DB;

class VagaController extends Controller
{
    public function index(){
        $vagas = Vaga::orderBy('nome')->get();
        $countvagas = DB::select('select count(id) as vagatotal from vagas');
        $countvagasliberado = DB::select('select count(id) as vagatotal from vagas where estado = "Liberado"');
        $countvagasocupado = DB::select('select count(id) as vagatotal from vagas where estado = "Ocupado"');
        return view('user.vaga.index' , [ 'vagas' => $vagas , 'countvagas' => $countvagas , 'countvagasliberado' => $countvagasliberado , 'countvagasocupado' => $countvagasocupado]);
    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $vagas = DB::table('vagas')
                        ->select('*')
                        ->where('nome', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('nome')
                        ->get();
            $countvagas = DB::select('select count(id) as vagatotal from vagas');
            $countvagasliberado = DB::select('select count(id) as vagatotal from vagas where estado = "Liberado"');
            $countvagasocupado = DB::select('select count(id) as vagatotal from vagas where estado = "Ocupado"');
            return view('user.vaga.index' , [ 'vagas' => $vagas , 'countvagas' => $countvagas , 'countvagasliberado' => $countvagasliberado , 'countvagasocupado' => $countvagasocupado]);
        }else{
            return redirect()->route('uservaga.index');
        }
    }
}
