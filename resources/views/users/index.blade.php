@extends('layout.default')

@section('title-aba', 'SGAM | Lista de Usuários')

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
    <div class="d-flex justify-content-between p-0 mb-5">
        <h5 class="fs-3 fw-bold">Usuários</h5>
        <form method="GET" action="{{ route('index.users') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="{{ request('nome') }}" placeholder="Busca por nome">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ request('email') }}" placeholder="Buscar por email">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="cpf" name="cpf"
                        value="{{ request('cpf') }}" placeholder="Buscar por CPF">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                    <a href="{{ route('index.users') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Limpar
                    </a>
                </div>
            </div>
        </form>
    </div>
    <!-- FORMULÁRIO DE FILTRO -->

    <!-- FIM DO FILTRO -->
    <div class="row gap-4">
        @foreach($users as $user)
        @include('users.parts.card_usuario', ['user' => $user])
        @endforeach
    </div>
</div>
<div class="p-3">
    {{ $users->links() }}
</div>

@endsection
