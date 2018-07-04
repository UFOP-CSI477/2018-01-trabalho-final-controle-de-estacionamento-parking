<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\TipoVeiculo;

class TipoVeiculoController extends Controller
{
    public function index()
    {
        $valores = TipoVeiculo::orderBy('tipo')->get();
        return view('admin.tipo_veiculo.index') -> with('valores',$valores);;
    }

    public function create()
    {
        return view('admin.tipo_veiculo.create');
    }

    public function store(Request $request)
    {
        if($request -> tipo == ""){
            session()->flash('mensagem_error_vazio', 'Erro ao inserir valor!');
            return redirect()->route('valor.create');
        }
        if($request -> valor == ""){
            session()->flash('mensagem_error_vazio', 'Erro ao inserir valor!');
            return redirect()->route('valor.create');
        }
        $valores = new TipoVeiculo();
        $valores -> tipo = $request -> tipo;
        $valor = str_replace(",", ".", $request -> valor);
        $valores -> valor_por_hora = $valor;
        try{
            $valores -> save();

        } catch (QueryException $e){
            session()->flash('mensagem_error', 'Erro ao inserir valor!');
            return redirect()->route('valor.create');
        }
        session()->flash('mensagem_success', 'Valor inserido com sucesso!');
        return redirect()->route('valor.create');
    }

    public function show(Request $request)
    {
        if($request -> table_search != ""){
            $valores = DB::table('tipo_veiculos')
                        ->select('*')
                        ->where('tipo', 'LIKE', '%'.$request->table_search.'%')
                        ->orderBy('tipo')
                        ->get();
            return view('admin.tipo_veiculo.index') -> with('valores',$valores);
        }else{
            $valores = TipoVeiculo::orderBy('tipo')->get();
            return view('admin.tipo_veiculo.index') -> with('valores',$valores);
        }
    }

    public function edit($id)
    {
        $valor = TipoVeiculo::find($id);
        if($valor == null){
            session()->flash('mensagem_edit_error_id', 'ID inválido!');
            return redirect()->route('valor.index');
        }
        return view('admin.tipo_veiculo.edit') -> with('valor',$valor);
    }

    public function update(Request $request, $id)
    {
        $valor = TipoVeiculo::find($id);
        $valor -> tipo = $request -> tipo;
        $valorr = str_replace(",", ".", $request -> valor);
        $valor -> valor_por_hora = $valorr;

        try{
            $valor -> save();
        }catch(QueryException $e){
            session()->flash('mensagem_edit_error', 'Erro ao editar o valor!');
            return redirect()->route('valor.index');
        }

        session()->flash('mensagem_edit_success', 'Valor editado com sucesso!');
        return redirect()->route('valor.index');
    }

    public function destroy($id)
    {
        $valor = TipoVeiculo::find($id);
        if($valor == null){
            session()->flash('mensagem_delete_error_id', 'ID inválido!');
            return redirect()->route('valor.index');
        }
        $valor -> delete();

        session()->flash('mensagem_delete_success', 'Valor excluido com sucesso!');
        return redirect()->route('valor.index');
    }
}
