<?php

namespace App\Http\Controllers\Oper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show2(){
        $user = User::find(Auth::user()->id);
        return view('oper.user.show',['user' => $user]);
    }

    public function editar()
    {
        $user = User::find(Auth::user()->id);
        return view('oper.user.editt') -> with('user',$user);
    }

    public function update2(Request $request)
    {
        if($request -> name == "" || $request -> telefone == "" || $request -> endereco == "" || $request -> cpf == "" || $request -> email == ""  ){
            session()->flash('mensagem_edit_error_vazio', 'Erro ao editar perfil!');
            return redirect()->route('uuser.showw');
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
            return redirect()->route('uuser.showw');
        }

        session()->flash('mensagem_edit_success', 'Perfil editado com sucesso!');
        return redirect()->route('uuser.showw');
    }
    public function password(){
        return view('oper.user.password');
    }

    public function updatepassword(Request $request){
        if($request->newsenha == $request->confirmsenha){
            $user = User::find(Auth::user()->id);
            $user -> password = Hash::make($request->newsenha);
            $user->save();
            session()->flash('mensagem_senha_success', 'Senha alterada com sucesso!');
            return redirect()->route('uuser.showw');
        }else{
            session()->flash('mensagem_senha_error', 'Erro ao mudar senha!');
            return redirect()->route('uuser.password');
        }

    }
}
