<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OperController extends Controller
{
    public function index(){
        $vagas = DB::select('select count(id) as vagatotal from vagas where estado = "Liberado"');
        $user = DB::select('select count(id) as usertotal from users where nivel = "Usuário"');
        $valor = DB::select('select count(id) as valortotal from valors');
        return view('oper.home.index',['vagas' => $vagas , 'user' => $user , 'valor' => $valor]);
    }
}
