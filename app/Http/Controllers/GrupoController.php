<?php

namespace App\Http\Controllers;

use App\Models\CoordenadorGrupo;
use App\Models\GrupoMusical;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $query = GrupoMusical::with('coordenador');

        if($request->filled('nome')){
            $query->where('nome', 'like', '%'.$request->nome.'%');
        }

        $grupos = $query->paginate(8);
        return view('grupos.index', compact('grupos'));
    }

    public function create(){
        $coordenadores = CoordenadorGrupo::with('user')->where('ativo', true)->get();
        return view('grupos.create', compact('coordenadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data' => 'required|date',
            'coordenador' => 'required|exists:coordenador_grupo,id'
        ]);
        $grupo = GrupoMusical::create([
            'nome' => $request->nome,
            'dataFundacao' => $request->data,
            'coordenador_id' => $request->coordenador
        ]);

        if($grupo){
            return redirect()->route('index.grupos')->with(['status' => 'Usuário cadastrado com sucesso']);
        }

        return redirect()->route('create.grupos')->with('status', 'Erro ao cadastrar usuário!');

    }

    public function edit(GrupoMusical $grupo)
    {
        $grupo->load('coordenador');
        $coordenadores = CoordenadorGrupo::with('user')->get();
        return view('grupos.edit', compact('grupo', 'coordenadores'));
    }

    public function update(Request $request, GrupoMusical $grupo){

        $request->validate([
            'nome' => 'required|string|max:255',
            'data' => 'required|date',
            'coordenador' => 'required|exists:coordenador_grupo,id',
        ]);

        $grupo->update([
            'nome' => $request->nome,
            'dataFundacao' => $request->data,
            'coordenador_id' => $request->coordenador,
        ]);

        return redirect()->route('index.grupos')->with(['status' => 'Usuário cadastrado com sucesso']);
    }

    public function destroy(GrupoMusical $grupo){
        $grupo->delete();

        return redirect()->route('index.grupos')->with('status', 'Grupo deletado com sucesso');
    }
}
