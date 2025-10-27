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
            <form method="GET" action="{{ route('index.solicitacoes') }}">
                <div class="row g-3">
                    <div class="col-md-7">
                        <select class="form-select" id="status_filtro" name="status_filtro">
                            <option value="">Selecione</option>
                            <option value="Aguadando disponibilidade de grupo"
                                {{ request('status_filtro') == 'Aguadando disponibilidade de grupo' ? 'selected' : '' }}>
                                Aguadando disponibilidade de grupo
                            </option>
                            <option value="Aprovada" {{ request('status_filtro') == 'Aprovada' ? 'selected' : '' }}>Aprovada
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
                                    <th scope="col" class="text-center" style="width: 15%">Código</th>
                                    <th scope="col" style="width: 10%">Data</th>
                                    <th scope="col" style="width: 15%">Endereço</th>
                                    <th scope="col" class="text-center" style="width: 15%">Informações do Solicitante
                                    </th>
                                    <th scope="col" class="text-center" style="width: 15%">Informações do Grupo</th>
                                    <th scope="col" class="text-center" style="width: 15%">Informações do Transporte</th>
                                    <th scope="col" class="text-center" style="width: 15%">Status Solicitação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitacoes as $solicitacao)
                                    <tr>
                                        <td class="text-wrap text-center">
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEvento{{ $solicitacao->evento->id }}">
                                                Solicitação Evento 0{{ $solicitacao->id }}/{{ date('Y') }}
                                            </button>
                                        </td>
                                        <td class="text-wrap">
                                            {{ \Carbon\Carbon::parse($solicitacao->evento->data)->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="text-wrap text-break">{{ $solicitacao->evento->endereco->logradouro }}
                                        </td>
                                        <td class="text-wrap text-center">
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalSolicitante{{ $solicitacao->id }}">
                                                Ver detalhes
                                            </button>
                                        </td>
                                        <td class="text-wrap text-center">
                                            @if ($solicitacao->informacoesGrupo)
                                                <button type="button" class="btn btn-outline-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalGrupo{{ $solicitacao->id }}">
                                                    Confirmado: {{ $solicitacao->informacoesGrupo->grupo->nome }}
                                                </button>
                                            @else
                                                <span class="text-muted">Nenhum grupo confirmado</span>
                                            @endif
                                        </td>
                                        <td class="text-center text-wrap">
                                            @if ($solicitacao->transporte)
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalTransporte{{ $solicitacao->id }}">
                                                    Ver transporte
                                                </button>
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
                                                    'Aguardando disponibilidade de grupo' => 'bg-warning text-dark',
                                                    default => 'bg-primary',
                                                };
                                            @endphp

                                            <span class="badge rounded-pill px-3 py-2 {{ $classeBadge }}">
                                                {{ $status }}
                                            </span>
                                        </td>

                                        {{-- MODAL EVENTO --}}
                                        <div class="modal fade" id="modalEvento{{ $solicitacao->evento->id }}"
                                            tabindex="-1" aria-labelledby="modalEventoLabel{{ $solicitacao->evento->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold"
                                                            id="modalEvento{{ $solicitacao->evento->id }}">
                                                            Informações do Evento
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Fechar"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <p><strong>Nome:</strong> {{ $solicitacao->evento->nome }}
                                                        </p>
                                                        <p class="text-break"><strong>Descrição:</strong>
                                                            {{ $solicitacao->evento->descricao ?? 'Não informado' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MODAL SOLICITANTE --}}
                                        <div class="modal fade" id="modalSolicitante{{ $solicitacao->id }}" tabindex="-1"
                                            aria-labelledby="modalSolicitanteLabel{{ $solicitacao->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold"
                                                            id="modalSolicitanteLabel{{ $solicitacao->id }}">
                                                            Informações do Solicitante
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Fechar"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <p><strong>Nome:</strong> {{ $solicitacao->evento->user->nome }}
                                                        </p>
                                                        <p><strong>Email:</strong>
                                                            {{ $solicitacao->evento->user->email ?? 'Não informado' }}
                                                        </p>
                                                        <p><strong>Telefone:</strong>
                                                            {{ $solicitacao->evento->user->telefone ?? 'Não informado' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MODAL GRUPO --}}
                                        @if ($solicitacao->informacoesGrupo)
                                            <div class="modal fade" id="modalGrupo{{ $solicitacao->id }}" tabindex="-1"
                                                aria-labelledby="modalGrupoLabel{{ $solicitacao->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold"
                                                                id="modalGrupoLabel{{ $solicitacao->id }}">
                                                                Informações do Grupo
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <p><strong>Nome do grupo:</strong>
                                                                {{ $solicitacao->informacoesGrupo->grupo->nome }}</p>
                                                            <p><strong>Estilo musical:</strong>
                                                                {{ $solicitacao->informacoesGrupo->grupo->estilo ?? 'Não informado' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- MODAL TRANSPORTE --}}
                                        @if ($solicitacao->transporte)
                                            <div class="modal fade" id="modalTransporte{{ $solicitacao->id }}"
                                                tabindex="-1"
                                                aria-labelledby="modalTransporteLabel{{ $solicitacao->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold"
                                                                id="modalTransporteLabel{{ $solicitacao->id }}">
                                                                Informações do Transporte
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <p><strong>Motorista:</strong>
                                                                {{ $solicitacao->transporte->motorista->nome ?? 'Não informado' }}
                                                            </p>
                                                            <p><strong>Placa:</strong>
                                                                {{ $solicitacao->transporte->veiculo->placa ?? 'Não informado' }}
                                                            </p>
                                                            <p><strong>Capacidade:</strong>
                                                                {{ $solicitacao->transporte->veiculo->capacidade ?? 'Não informado' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
