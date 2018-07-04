<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $vagas = DB::select('select count(id) as vagatotal from vagas where estado = "Liberado"');
        $user = DB::select('select count(id) as usertotal from users where nivel = "Usuário"');
        $valor = DB::select('select count(id) as valortotal from valors');
        return view('user.home.index',['vagas' => $vagas , 'user' => $user , 'valor' => $valor]);
    }

    public function show2(){
        $user = User::find(Auth::user()->id);
        return view('user.user.show',['user' => $user]);
    }

    public function editar()
    {
        $user = User::find(Auth::user()->id);
        return view('user.user.editt') -> with('user',$user);
    }

    public function update2(Request $request)
    {
        if($request -> name == "" || $request -> telefone == "" || $request -> endereco == "" || $request -> cpf == "" || $request -> email == ""  ){
            session()->flash('mensagem_edit_error_vazio', 'Erro ao editar perfil!');
            return redirect()->route('uuuser.showw');
        }

        $user = User::find(Auth::user()->id);
        $user -> name = $request -> name;
        $user->telefone = $request->telefone;
        $user -> cpf = $request -> cpf;
        $user -> endereco = $request -> endereco;
        $user -> email = $request -> email;

        try{
            $user -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_edit_error', 'Erro ao editar o perfil!');
            return redirect()->route('uuuser.showw');
        }

        session()->flash('mensagem_edit_success', 'Perfil editado com sucesso!');
        return redirect()->route('uuuser.showw');
    }
    public function password(){
        return view('user.user.password');
    }

    public function updatepassword(Request $request){
        if($request->newsenha == $request->confirmsenha){
            $user = User::find(Auth::user()->id);
            $user -> password = Hash::make($request->newsenha);
            $user->save();
            session()->flash('mensagem_senha_success', 'Senha alterada com sucesso!');
            return redirect()->route('uuuser.showw');
        }else{
            session()->flash('mensagem_senha_error', 'Erro ao mudar senha!');
            return redirect()->route('uuuser.password');
        }

    }
}
