@extends('layout.default')

@section('title-aba', 'SGAM | Lista de Solicitações')

@section('content')

<style>
    .form-control:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #1a70c7ff !important;
    }

    .table thead th {
        font-weight: 600;
        color: #4a4a4a;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease-in-out;
    }

    .card {
        border-radius: 1rem;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.6em;
    }
</style>

@session('status')
<div class="alert alert-success">
    {{ $value }}
</div>
@endsession
<div class="container-fluid p-5 shadow-sm" style=" background-color: #fcfcfcff;">
    <div class="d-flex flex-column flex-md-row justify-content-between p-0 mb-5 gap-2">
        <h5 class="fs-3 fw-bold">Eventos Cadastrados</h5>
        <form method="GET" action="{{ route('index.eventos') }}">
            <div class="row g-3">
                <div class="col-md-7">
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="{{ request('nome') }}" placeholder="Busca por nome">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                    <a href="{{ route('index.eventos') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Limpar
                    </a>
                </div>
            </div>
        </form>
    </div>
    @if (count($eventos) > 0)
    <div class="card shadow-sm border-0 mt-3">
        <div class="card-header bg-white border-0">
            <h5 class="fw-bold text-primary m-0 d-flex align-items-center">
                <i class="bi bi-calendar-event me-2"></i> Eventos
            </h5>
            <div class="d-flex align-items-center justify-content-end">
                <button class="btn btn-sm btn-outline-primary me-1">Excel</button>
                <button class="btn btn-sm btn-outline-secondary">CSV</button>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Endereco</th>
                            <th scope="col">Responável</th>
                            <th scope="col" class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                        <tr>
                            <td class="text-wrap">{{ $evento->nome }}</td>
                            <td class="text-wrap">{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y H:i') }}</td>
                            <td class="text-wrap">{{ $evento->endereco->logradouro }}</td>
                            <td class="text-wrap">{{ $evento->user->nome.' '.$evento->user->sobrenome }}</td>
                            <td class="text-center d-flex gap-2 align-items-center justify-content-center">
                                <a href="#" class="btn btn-outline-warning btn-sm mb-1" title="Editar">
                                    <i class="bi bi-gear-fill"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary mb-1" title="Fazer Solicitação">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Excluir">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-end small text-muted bg-white border-0">
            {{ $eventos->links() }}
        </div>
    </div>
    @else
    <div class="d-flex justify-content-center">
        <h3>Nenhum Evento Cadastrado</h3>
    </div>
    @endif
</div>

@endsection
