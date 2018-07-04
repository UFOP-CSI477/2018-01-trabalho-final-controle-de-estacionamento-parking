<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $vagas = DB::select('select count(id) as vagatotal from vagas where estado = "Liberado"');
        $user = DB::select('select count(id) as usertotal from users where nivel = "Usuário"');
        $valor = DB::select('select count(id) as valortotal from valors');
        return view('admin.home.index',['vagas' => $vagas , 'user' => $user , 'valor' => $valor]);
    }
}
