<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Vaga;

class VagaController extends Controller
{

    public function index()
    {
        $vagas = Vaga::orderBy('nome')->get();
        return view('admin.vaga.index') -> with('vagas',$vagas);
    }

    public function create()
    {
        return view('admin.vaga.create');
    }

    public function store(Request $request)
    {
        if($request -> nome == ""){
            session()->flash('mensagem_error_vazio', 'Erro ao inserir vaga!');
            return redirect()->route('vaga.create');
        }
        $vagas = new Vaga();
        $vagas -> nome = $request -> nome;
        $vagas -> estado = "Liberado";
        try{
            $vagas -> save();

        } catch (QueryException $e){
            session()->flash('mensagem_error', 'Erro ao inserir vaga!');
            return redirect()->route('vaga.create');
        }
        session()->flash('mensagem_success', 'Vaga inserida com sucesso!');
        return redirect()->route('vaga.create');



    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $vagas = DB::table('vagas')
                        ->select('*')
                        ->where('nome', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('nome')
                        ->get();
            return view('admin.vaga.index') -> with('vagas',$vagas);
        }else{
            $vagas = Vaga::orderBy('nome')->get();
            return view('admin.vaga.index') -> with('vagas',$vagas);
        }
    }

    public function edit($id)
    {
        $vaga = Vaga::find($id);
        if($vaga == null){
            session()->flash('mensagem_edit_error_id', 'ID inválido!');
            return redirect()->route('vaga.index');
        }
        return view('admin.vaga.edit') -> with('vaga',$vaga);
    }

    public function update(Request $request, $id)
    {
        $vaga = Vaga::find($id);
        $vaga -> nome = $request -> nome;

        try{
            $vaga -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_edit_error', 'Erro ao editar a vaga!');
            return redirect()->route('vaga.index');
        }

        session()->flash('mensagem_edit_success', 'Vaga editada com sucesso!');
        return redirect()->route('vaga.index');
    }

    public function destroy($id)
    {
        $vaga = Vaga::find($id);

        if($vaga == null){
            session()->flash('mensagem_delete_error_id', 'ID inválido!');
            return redirect()->route('vaga.index');
        }

        $vaga -> delete();

        session()->flash('mensagem_delete_success', 'Vaga excluida com sucesso!');
        return redirect()->route('vaga.index');
    }
}
