@extends('layout.default')

@section('title-aba', 'SGAM | Informações Evento')

@section('content')

    @session('error')
        <div class="alert alert-danger">
            {{ $value }}
        </div>
    @endsession
    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Solicitação Evento 0{{ $solicitacao->id }}/{{ date('Y') }}</div>
        @include('solicitacoes.parts.card_evento', ['solicitacao' => $solicitacao])
        @if (
            $solicitacao->status != 'Cancelado pelo solicitante' &&
            $solicitacao->status != 'Solicitação cancelada por falta de transporte' &&
            $solicitacao->status != 'Solicitação cancelada por falta de grupo' &&
            $solicitacao->status != 'Concluido' &&
            $solicitacao->status != 'Evento confirmado' &&
            $solicitacao->evento->user->id == $user->id
            )
            <form action="{{ route('cancelar.solicitacoes', $solicitacao) }}" method="POST">
                @method('PUT')
                @csrf
                @include('solicitacoes.parts.card_alterar_status_solicitante', [
                    'solicitacao' => $solicitacao,
                ])
            </form>
        @endif

        @include('solicitacoes.parts.card_solicitante', ['solicitacao' => $solicitacao]) <br>
        @if ($solicitacao->informacoesGrupo)
            @include('solicitacoes.parts.card_grupo', ['solicitacao' => $solicitacao])
            @if (
            $solicitacao->status != 'Cancelado pelo solicitante' &&
            $solicitacao->status != 'Solicitação cancelada por falta de transporte' &&
            $solicitacao->status != 'Solicitação cancelada por falta de grupo' &&
            $solicitacao->status != 'Concluido' &&
            $solicitacao->status != 'Evento confirmado' &&
            $solicitacao->informacoesGrupo->grupo->coordenador->user->id == $user->id
            )
            @role('coordenador')
                <form action="{{ route('cancelar.grupo', $solicitacao) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('solicitacoes.parts.card_alterar_status_coordenador', [
                        'solicitacao' => $solicitacao
                    ])
                </form>
            @endrole
            @endif
        @endif

        @if ($solicitacao->transporte)
            @include('solicitacoes.parts.card_transporte', ['solicitacao' => $solicitacao])
        @endif
        @role('admin')
            <form action="{{ route('cancelaradmin.solicitacoes', $solicitacao) }}" method="POST">
                @method('PUT')
                @csrf
                @include('solicitacoes.parts.card_alterar_status_admin', [
                    'solicitacao' => $solicitacao,
                ])
            </form>
        @endrole
    </div>
    @vite('resources/css/app.css')
@endsection
