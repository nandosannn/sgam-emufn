<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\GrupoMusical;
use App\Models\Solicitacao;
use App\Models\TransporteVeiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InformacoesGrupo;

class SolicitacaoController extends Controller
{
    public function create(Evento $evento)
    {
        return view('solicitacoes.create', compact('evento'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => ['required', 'integer', 'exists:evento,id'],
            'justificativa' => ['required', 'string', 'max:5000'],
            'status' => ['required', 'string', 'max:5000'],
            'confirmacao_lanche' => ['required', 'boolean'],
        ]);

        $solicitacao = Solicitacao::create(
            [
                'evento_id' => $request->evento_id,
                'justificativa' => $request->justificativa,
                'status' => $request->status,
                'confirmacao_lanche' => $request->confirmacao_lanche
            ]
        );

        if ($solicitacao) {
            return redirect()->route('index.eventos')->with('status', 'Solicitação de grupo musical enviada com sucesso');
        }

        return redirect()->route('index.eventos')->with('error', 'Erro ao enviar solicitação');
    }

    public function index(Request $request)
    {
        $query = Solicitacao::with('informacoesGrupo', 'evento', 'transporte');

        if ($request->filled('status_filtro')) {
            $query->where('status', 'like', '%' . $request->status_filtro . '%');
        }

        $solicitacoes = $query->paginate(8);

        return view('solicitacoes.index', compact('solicitacoes'));
    }

    public function informacoesSolicitacao(Solicitacao $solicitacao)
    {
        return view('solicitacoes.informacoes_solicitacao', compact('solicitacao'));
    }

    public function solicitacoesAbertas(Request $request)
    {
        $query = Solicitacao::where('status', 'Aguardando disponibilidade de grupo');

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $solicitacoes = $query->paginate(8);
        return view('solicitacoes.abertas', compact('solicitacoes'));
    }

    public function solicitacoesAcompanhar(Request $request)
    {
        $q = Solicitacao::whereHas('evento.user', function ($query) {
            $query->where('id', Auth::id());
        });

        if ($request->filled('status_filtro')) {
            $q->where('status', 'like', '%' . $request->status_filtro . '%');
        }

        $solicitacoes = $q->paginate(8);

        return view('solicitacoes.acompanhar_solicitacao', compact('solicitacoes'));
    }

    public function solicitacoesAcompanharCoord(Request $request)
    {
        $q = Solicitacao::whereHas('informacoesGrupo.grupo.coordenador.user', function ($query) {
            $query->where('id', Auth::id());
        });

        if ($request->filled('status_filtro')) {
            $q->where('status', 'like', '%' . $request->status_filtro . '%');
        }

        $solicitacoes = $q->paginate(8);
        return view('solicitacoes.acompanhar_coord', compact('solicitacoes'));
    }

    public function cancelarSolicitacao(Request $request, Solicitacao $solicitacao)
    {
        $request->validate([
            'status' => 'required|string|max:255'
        ]);

        if ($request->status === 'Cancelar solicitacao') {
            $solicitacao->status = 'Cancelado';
            $solicitacao->informacoes_transporte_id = null;

            $grupo = InformacoesGrupo::where('solicitacao_id', $solicitacao->id)->first();
            if ($grupo) {
                $grupo->delete();
            }
            $solicitacao->save();
        } elseif ($request->status === 'Cancelar transporte') {
            $solicitacao->status = 'Aguardando disponibilidade de grupo';
            $solicitacao->informacoes_transporte_id = null;
            $solicitacao->save();
        }

        return redirect()->route('solicitanteabertas.solicitacoes')->with('status', 'Alteração de status feita com sucesso');
    }

    public function cancelarSolicitacaoAdmin(Request $request, Solicitacao $solicitacao)
    {
        $request->validate([
            'status' => 'required|string|max:255'
        ]);

        if ($request->status === 'Cancelar solicitacao por falta de transporte') {
            $solicitacao->status = 'Solicitacão cancelada por falta de transporte';
            $solicitacao->save();
        } elseif ($request->status === 'Cancelar solicitacao por falta de grupo') {
            $solicitacao->status = 'Solicitacão cancelada por falta de grupo';
            $solicitacao->save();
        } elseif ($request->status === 'Concluir solicitacao') {
            $solicitacao->status = 'Concluido';
            $solicitacao->save();
        } elseif ($request->status === 'Evento confirmado') {
            $solicitacao->status = 'Evento confirmado';
            $solicitacao->save();
        }

        return redirect()->route('index.solicitacoes')->with('status', 'Alteração de status feita com sucesso');
    }
}
