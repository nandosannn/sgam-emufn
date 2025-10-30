@extends('layout.default')

@section('title-aba', 'SGAM | Confirmar Grupo')

@section('content')

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@session('status')
<div class="alert alert-success">
    {{ $value }}
</div>
@endsession
    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Confirmar Grupo</div>
        <form action="{{route('informacoesconfirmacao.grupos')}}" method="POST">
            @csrf
            @include('grupos.parts.card_confirmacao_grupo', ['solicitacao' => $solicitacao])
            @include('grupos.parts.card_dados_endereco')
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Confirmar</button>
            </div>
        </form>
    </div>
@vite('resources/css/app.css')
@endsection
