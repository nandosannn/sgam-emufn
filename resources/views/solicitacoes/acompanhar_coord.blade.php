@extends('layout.default')

@section('title-aba', 'SGAM | Lista de Solicitações')

@section('content')

    @session('status')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <div class="font container-fluid p-5 shadow-sm" style=" background-color: #fcfcfcff;">
        <div class="d-flex flex-column flex-md-row justify-content-between p-0 mb-5 gap-2">
            <h5 class="fs-3 fw-bold">Lista de Solicitações</h5>
            <form method="GET" action="{{ route('acompanharcoord.solicitacoes') }}">
                <div class="row g-3">
                    <div class="col-md-7">
                        <select class="form-select" id="status_filtro" name="status_filtro">
                            <option value="">Selecione</option>
                            <option value="Aguadando disponibilidade de grupo"
                                {{ request('status_filtro') == 'Aguadando disponibilidade de grupo' ? 'selected' : '' }}>
                                Aguadando disponibilidade de grupo
                            </option>
                            <option value="Aguardando confirmação do transporte"
                                {{ request('status_filtro') == 'Aguardando confirmação do transporte' ? 'selected' : '' }}>
                                Aguardando confirmação do transporte
                            </option>
                            <option value="Recusada" {{ request('status_filtro') == 'Recusada' ? 'selected' : '' }}>Recusada
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-search"></i> Filtrar
                        </button>
                        <a href="{{ route('index.solicitacoes') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Limpar
                        </a>
                    </div>
                </div>
            </form>
        </div>
        @if (count($solicitacoes) > 0)
            <div class="card shadow-sm border-0 mt-3">
                <div class="card-header bg-white border-0">
                    <h5 class="icone fw-bold text-primary m-0 d-flex align-items-center">
                        <i class="bi bi-calendar-event me-2"></i> Solicitações
                    </h5>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 p-2">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center" style="width: 20%">Informações Detalhadas</th>
                                    <th scope="col" style="width: 10%">Data do Evento</th>
                                    <th scope="col" class="text-center" style="width: 15%">Solicitante
                                    </th>
                                    <th scope="col" class="text-center" style="width: 20%">Grupo</th>
                                    <th scope="col" class="text-center" style="width: 15%">Transporte</th>
                                    <th scope="col" class="text-center" style="width: 20%">Status Solicitação</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitacoes as $solicitacao)
                                    <tr>
                                        <td class="text-wrap text-center">
                                            <a href="{{ route('informacoes.solicitacoes', $solicitacao) }}" type="button"
                                                class="btn btn-outline-primary btn-sm">
                                                Solicitação Evento 0{{ $solicitacao->id }}/{{ date('Y') }}
                                            </a>
                                        </td>
                                        <td class="text-wrap">
                                            {{ \Carbon\Carbon::parse($solicitacao->evento->data)->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="text-wrap text-center">
                                            <span
                                                class="text-black">{{ $solicitacao->evento->user->nome . ' ' . $solicitacao->evento->user->sobrenome }}</span>

                                        </td>
                                        <td class="text-wrap text-center">
                                            @if ($solicitacao->informacoesGrupo && $solicitacao->status != 'Solicitação cancelada por falta de grupo')
                                                <span
                                                    class="bg-success border-success badge rounded-pill px-3 py-2 text-white">Confirmado:
                                                    {{ $solicitacao->informacoesGrupo->grupo->nome }}</span>
                                            @elseif($solicitacao->status == 'Solicitação cancelada por falta de grupo')
                                                <span
                                                    class="bg-danger border-danger badge rounded-pill px-3 py-2 text-white">Indisponibilidade de Grupo</span>
                                            @else
                                                <span class="text-muted">Nenhum grupo confirmado</span>
                                            @endif
                                        </td>
                                        <td class="text-center text-wrap">
                                            @if ($solicitacao->transporte && $solicitacao->status != 'Solicitação cancelada por falta de transporte')
                                                <span
                                                    class="bg-success border-success badge rounded-pill px-3 py-2 text-white">Confirmado</span>
                                            @elseif($solicitacao->status == 'Solicitação cancelada por falta de transporte')
                                                <span
                                                    class="bg-danger border-danger badge rounded-pill px-3 py-2 text-white">Cancelado</span>
                                            @else
                                                <span class="text-muted">Nenhum transporte confirmado</span>
                                            @endif
                                        </td>
                                        <td class="text-center text-wrap">
                                            @php
                                                $status = $solicitacao->status;
                                                $classeBadge = match ($status) {
                                                    'Aprovada' => 'bg-success',
                                                    'Recusada' => 'bg-danger',
                                                    'Aguardando disponibilidade de grupo' => 'bg-primary text-white',
                                                    default => 'bg-primary',
                                                };
                                            @endphp

                                            <span class="badge rounded-pill px-3 py-2 {{ $classeBadge }}">
                                                {{ $status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end small text-muted bg-white border-0 mt-3">
                    {{ $solicitacoes->links() }}
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <h3>Nenhuma Solicitação Cadastrado</h3>
            </div>
        @endif
    </div>
    @vite('resources/css/app.css')
@endsection
