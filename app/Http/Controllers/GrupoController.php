<?php

namespace App\Http\Controllers;

use App\Models\CoordenadorGrupo;
use App\Models\GrupoMusical;
use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $query = GrupoMusical::with('coordenador');

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $grupos = $query->paginate(8);
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
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

        if ($grupo) {
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

    public function update(Request $request, GrupoMusical $grupo)
    {
        $user = Auth::user();
        /** @var \App\Models\User|\Spatie\Permission\Traits\HasRoles $user */
        if ($user->hasRole('admin')) {
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

        $request->validate([
            'nome' => 'required|string|max:255',
            'data' => 'required|date',
        ]);

        $grupo->update([
            'nome' => $request->nome,
            'dataFundacao' => $request->data,
        ]);
        return redirect()->route('coordenados.grupos')->with(['status' => 'Usuário cadastrado com sucesso']);
    }

    public function destroy(GrupoMusical $grupo)
    {
        $grupo->delete();
        return redirect()->route('index.grupos')->with('status', 'Grupo deletado com sucesso');
    }

    public function gruposCoordenados(Request $request)
    {
        $usuario = Auth::user();
        $grupos = collect();
        $query = GrupoMusical::query();

        if ($usuario) {
            $usuarioCord = CoordenadorGrupo::where('user_id', $usuario->id)->first();
            if ($usuarioCord) {
                $query = GrupoMusical::where('coordenador_id', $usuarioCord->id);
            } else {
                $query = GrupoMusical::whereRaw('1 = 0');
            }
        }

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $grupos = $query->paginate(8);

        return view('grupos.coordenados', compact('grupos'));
    }

    public function gruposInformacoes(Solicitacao $solicitacao){

        $user = Auth::user();

        $userCoord = CoordenadorGrupo::where('user_id', $user->id)->first();
        $grupos = collect();
        if($userCoord){
            $grupos = GrupoMusical::where('coordenador_id', $userCoord->id)->get();
        }

        return view('grupos.confirmar_grupo_solicitacao', compact('solicitacao', 'grupos'));
    }
}
