@extends('layout.default')

@section('title-aba', 'SGAM | Informações Evento')

@section('content')

@session('error')
<div class="alert alert-danger">
    {{ $value }}
</div>
@endsession
<div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
    <div class="fs-4 fw-bold mb-4">Informações do Evento</div>
    @include('solicitacoes.parts.card_evento', ['solicitacao' => $solicitacao])
</div>
@vite('resources/css/app.css')
@endsection
