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
                                {{ request('status_filtro') == 'Aguadando disponibilidade de grupo' ? 'selected' : '' }}>Aguadando disponibilidade de grupo
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
                                    <th scope="col" style="width: 15%">Código</th>
                                    <th scope="col" style="width: 10%">Data</th>
                                    <th scope="col" style="width: 15%">Endereço</th>
                                    <th scope="col" style="width: 15%">Informações do Solicitante</th>
                                    <th scope="col" class="text-center" style="width: 15%">Informações do Grupo</th>
                                    <th scope="col" class="text-center" style="width: 15%">Informações do Transporte</th>
                                    <th scope="col" class="text-center" style="width: 15%">Status Solicitação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitacoes as $solicitacao)
                                    <tr>
                                        <td class="text-wrap">Solicitacao Evento 0{{$solicitacao->id}}/{{date('Y')}}</td>
                                        <td class="text-wrap">
                                            {{ \Carbon\Carbon::parse($solicitacao->evento->data)->format('d/m/Y H:i') }}</td>
                                        <td class="text-wrap text-break">{{ $solicitacao->evento->endereco->logradouro }}</td>
                                        <td class="text-wrap"> {{$solicitacao->evento->user->nome}} </td>
                                        <td class="text-wrap text-center">
                                             {{ $solicitacao->informacoesGrupo ? $solicitacao->informacoesGrupo->grupo->nome : 'Nenhum grupo confirmado' }}
                                        </td>
                                        <td class="text-center text-wrap">
                                            {{ $solicitacao->transporte ? 'Transporte confirmado' : 'Nenhum transporte confirmado' }}
                                        </td>
                                        <td class="text-center text-wrap">
                                            {{$solicitacao->status}}
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
