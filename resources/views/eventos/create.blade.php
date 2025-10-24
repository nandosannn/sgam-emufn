@extends('layout.default')

@section('title-aba', 'SGAM | Adicionar Evento')

@section('content')

<style>
    .form-control:focus, .form-select:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #1a70c7ff !important;
    }
</style>

@session('error')
<div class="alert alert-danger">
    {{ $value }}
</div>
@endsession

    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Criar Evento</div>
        <form action="{{route('store.eventos')}}" method="POST">
            @csrf
            @include('eventos.parts.card_dados_evento', ['user' => $user])
            @include('eventos.parts.card_dados_endereco')
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Adicionar</button>
            </div>
        </form>
    </div>
@vite('resources/css/app.css')
@endsection
