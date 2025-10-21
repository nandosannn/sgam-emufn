@extends('layout.default')

@section('title-aba', 'SGAM | Lista de Grupos')

@section('content')

<style>
    .form-control:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #1a70c7ff !important;
    }
</style>

@session('status')
<div class="alert alert-success">
    {{ $value }}
</div>
@endsession
<div class="container-fluid p-5 shadow-sm" style=" background-color: #fcfcfcff;">
    <div class="d-flex flex-column flex-md-row justify-content-between p-0 mb-5 gap-2">
        <h5 class="fs-3 fw-bold">Grupos</h5>
        <form method="GET" action="{{ route('index.grupos') }}">
            <div class="row g-3">
                <div class="col-md-7">
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="{{ request('nome') }}" placeholder="Busca por nome">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                    <a href="{{ route('index.grupos') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Limpar
                    </a>
                </div>
            </div>
        </form>
    </div>
    @if (count($grupos) > 0)
    <div class="row">

    </div>
    @else
    <div class="d-flex justify-content-center">
        <h3>Nenhum Grupo Cadastrado</h3>
    </div>
    @endif
</div>
<div class="p-3">
    {{ $grupos->links() }}
</div>

@endsection
