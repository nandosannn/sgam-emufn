<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Motorista;
use App\Models\Solicitacao;
use App\Models\SolicitacaoTransporte;
use App\Models\TransporteVeiculos;
use App\Models\Veiculos;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function confirmarTransporte(Solicitacao $solicitacao)
    {
        return view('transporte.confirmar_transporte', compact('solicitacao'));
    }

    public function adicionarTransporte(Solicitacao $solicitacao, Request $request)
    {
        $request->validate([
            'solicitacao_transporte_id' => ['required', 'integer', 'exists:solicitacao,id'],
            'descricao' => ['required', 'string', 'max:5000'],
            'horarioIda' => ['required', 'date_format:Y-m-d\TH:i'],
            'horarioVolta' => ['required', 'date_format:Y-m-d\TH:i'],
            'nome_motorista' => ['required', 'string', 'max:5000'],
            'telefone' => ['required', 'string', 'max:5000'],
            'cnh' => ['required', 'string', 'max:5000'],
            'cor' => ['required', 'string', 'max:5000'],
            'capacidade' => ['required', 'string', 'max:5000'],
        ]);

        $motorista = Motorista::create([
            'cnh' => $request->cnh,
            'nome_motorista' => $request->nome_motorista,
            'telefone' => $request->telefone
        ]);

        $veiculo = Veiculos::create([
            'motorista_id' => $motorista->id,
            'placa' => $request->placa,
            'cor' => $request->cor,
            'capacidade' => $request->capacidade
        ]);

        $solicitacaoTransporte = SolicitacaoTransporte::create([
            'status' => 'confirmado',
            'descricao' => $request->descricao,
            'veiculo_id' => $veiculo->id,
            'horarioIda' => $request->horarioIda,
            'horarioVolta' => $request->horarioVolta
        ]);

        if ($solicitacaoTransporte) {
            $solicitacao->informacoes_transporte_id = $solicitacaoTransporte->id;
            $solicitacao->status = 'Confirmado transporte';
            $solicitacao->save();
            return redirect()->route('solicitanteabertas.solicitacoes')->with('status', 'Transporte confirmado');
        }
         return redirect()->route('confirmar.transporte', $solicitacao)->with('error', 'Transporte não adicionado');

    }
}
