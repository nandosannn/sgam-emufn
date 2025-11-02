@extends('layout.default')

@section('title-aba', 'SGAM | Confirmar Transporte')

@section('content')

@session('status')
<div class="alert alert-success">
    {{ $value }}
</div>
@endsession
    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Solicitação de Transporte</div>
        <form action="{{route('adicionar.transporte', $solicitacao)}}" method="POST">
            @csrf
            @include('transporte.parts.card_dados_transporte', ['solicitacao' => $solicitacao])
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Confirmar</button>
            </div>
        </form>
    </div>
@vite('resources/css/app.css')
@endsection
