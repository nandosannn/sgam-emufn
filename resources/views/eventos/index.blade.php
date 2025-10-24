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
            <h5 class="icone fw-bold text-primary m-0 d-flex align-items-center">
                <i class="bi bi-calendar-event me-2"></i> Eventos
            </h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 p-2">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 20%">Nome</th>
                            <th scope="col" style="width: 10%">Data</th>
                            <th scope="col" style="width: 35%">Endereço</th>
                            <th scope="col" style="width: 15%">Responsável</th>
                            <th scope="col" class="text-center" style="width: 20%">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $evento)
                        <tr >
                            <td class="text-wrap">{{ $evento->nome }}</td>
                            <td class="text-wrap">{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y H:i') }}</td>
                            <td class="text-wrap text-break">{{ $evento->endereco->logradouro }}</td>
                            <td class="text-wrap">{{ $evento->user->nome.' '.$evento->user->sobrenome }}</td>
                            <td class="text-center text-wrap">
                                <div class="d-flex gap-2 justify-content-center flex-wrap">
                                    <a href="{{ route('create.silicitacoes', $evento) }}" class="btn btn-sm btn-outline-primary" title="Fazer Solicitação">
                                        <i class="bi bi-clipboard2-check-fill"></i> Fazer solicitação
                                    </a>
                                    <a href="{{ route('edit.eventos', $evento) }}" class="btn btn-outline-secondary btn-sm" title="Editar">
                                        <i class="bi bi-gear-fill"></i>
                                    </a>
                                    <form action="{{ route('destroy.eventos', $evento) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Excluir">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-end small text-muted bg-white border-0 mt-3">
            {{ $eventos->links() }}
        </div>
    </div>
    @else
    <div class="d-flex justify-content-center">
        <h3>Nenhum Evento Cadastrado</h3>
    </div>
    @endif
</div>
@vite('resources/css/app.css')
@endsection
