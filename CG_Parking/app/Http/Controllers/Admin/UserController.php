<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::select('select * from users order by nivel , name');
        return view('admin.user.index') -> with('user',$user);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        if($request -> nome == "" || $request -> telefone == "" || $request -> endereco == "" || $request -> cpf == "" || $request -> email == "" || $request -> senha == "" || $request -> nivel == "0" ){
            session()->flash('mensagem_error_vazio', 'Erro ao cadastrar usuário!');
            return redirect()->route('user.create');
        }
        $user = new User();
        $user->name = $request->nome;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = bcrypt($request->senha);
        $user->nivel = $request->nivel;
        try{
            $user->save();
        } catch (QueryException $e){
            session()->flash('mensagem_error', 'Erro ao cadastrar usuário!');
            return redirect()->route('user.create');
        }
        session()->flash('mensagem_success', 'Usuário cadastrado com sucesso!');
        return redirect()->route('user.create');



    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $user = DB::table('users')
                        ->select('*')
                        ->where('name', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('nivel')
                        ->orderBy('name')
                        ->get();
            return view('admin.user.index') -> with('user',$user);
        }else{
            return redirect()->route('user.index');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if($user == null){
            session()->flash('mensagem_edit_error_id', 'ID inválido!');
            return redirect()->route('user.index');
        }
        return view('admin.user.edit') -> with('user',$user);
    }

    public function update(Request $request, $id)
    {
        if($request -> name == "" || $request -> telefone == "" || $request -> endereco == "" || $request -> cpf == "" || $request -> email == "" ||  $request -> nivel == "0" ){
            session()->flash('mensagem_edit_error_vazio', 'Erro ao editar usuário!');
            return redirect()->route('user.edit',$id);
        }

        $user = User::find($id);
        $user -> name = $request -> name;
        $user->telefone = $request->telefone;
        $user -> cpf = $request -> cpf;
        $user -> endereco = $request -> endereco;
        $user -> email = $request -> email;
        $user -> nivel = $request -> nivel;


        try{
            $user -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_edit_error', 'Erro ao editar o usuário!');
            return redirect()->route('user.index');
        }

        session()->flash('mensagem_edit_success', 'Usuário editado com sucesso!');
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user == null){
            session()->flash('mensagem_delete_error_id', 'ID inválido!');
            return redirect()->route('user.index');
        }

        $user -> delete();

        session()->flash('mensagem_delete_success', 'Usuário excluido com sucesso!');
        return redirect()->route('user.index');
    }

    public function show2(){
        $user = User::find(Auth::user()->id);
        return view('admin.user.show',['user' => $user]);
    }

    public function editar()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.user.editt') -> with('user',$user);
    }

    public function update2(Request $request)
    {
        if($request -> name == "" || $request -> telefone == "" || $request -> endereco == "" || $request -> cpf == "" || $request -> email == ""  ){
            session()->flash('mensagem_edit_error_vazio', 'Erro ao editar perfil!');
            return redirect()->route('user.showw');
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
            return redirect()->route('user.showw');
        }

        session()->flash('mensagem_edit_success', 'Perfil editado com sucesso!');
        return redirect()->route('user.showw');
    }
    public function password(){
        return view('admin.user.password');
    }

    public function updatepassword(Request $request){
        if($request->newsenha == $request->confirmsenha){
            $user = User::find(Auth::user()->id);
            $user -> password = Hash::make($request->newsenha);
            $user->save();
            session()->flash('mensagem_senha_success', 'Senha alterada com sucesso!');
            return redirect()->route('user.showw');
        }else{
            session()->flash('mensagem_senha_error', 'Erro ao mudar senha!');
            return redirect()->route('user.password');
        }

    }

}
