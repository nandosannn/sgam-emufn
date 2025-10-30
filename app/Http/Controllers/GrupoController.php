<?php

namespace App\Http\Controllers;

use App\Models\CoordenadorGrupo;
use App\Models\Endereco;
use App\Models\Evento;
use App\Models\GrupoMusical;
use App\Models\InformacoesGrupo;
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

    public function gruposInformacoes(Solicitacao $solicitacao)
    {

        $user = Auth::user();

        $userCoord = CoordenadorGrupo::where('user_id', $user->id)->first();
        $grupos = collect();
        if ($userCoord) {
            $grupos = GrupoMusical::where('coordenador_id', $userCoord->id)->get();
        }

        return view('grupos.confirmar_grupo_solicitacao', compact('solicitacao', 'grupos'));
    }

    public function gruposConfirmar(Request $request)
    {
        $request->validate([
            'solicitacao_id' => [
                'required',
                'integer',
                'exists:solicitacao,id',
            ],
            'informacoes_musicos' => 'required|string|max:1000',
            'informacoes_instrumentos' => 'required|string|max:1000',
            'grupo_musical_id' => [
                'required',
                'integer',
                'exists:grupo_musical,id',
            ],
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:50',
        ]);

        $evento = Endereco::create([
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
        ]);

        if ($evento) {
            $grupoConfirmado = InformacoesGrupo::create([
                'grupo_musical_id' => $request->grupo_musical_id,
                'solicitacao_id' => $request->solicitacao_id,
                'endereco_musicos_id' => $evento->id,
                'informacoes_musicos' => $request->informacoes_musicos,
                'informacoes_instrumentos' => $request->informacoes_instrumentos,
            ]);

            if($grupoConfirmado){
                $solicitacao = Solicitacao::find($request->solicitacao_id);
                $solicitacao->status = 'Grupo confirmado';
                $solicitacao->save();
                return redirect()->route('abertas.solicitacoes')->with('status', 'Grupo confirmado com sucesso!');
            }
        }
        return redirect()->route('abertas.solicitacoes')->with('error', 'Grupo não foi confirmado!');
    }
}
