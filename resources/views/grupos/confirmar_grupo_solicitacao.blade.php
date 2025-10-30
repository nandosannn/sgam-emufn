@extends('layout.default')

@section('title-aba', 'SGAM | Confirmar Grupo')

@section('content')

@session('error')
<div class="alert alert-danger">
    {{ $value }}
</div>
@endsession
    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Confirmar Grupo</div>
        <form action="{{route('informacoesconfirmacao.grupos', $solicitacao)}}" method="POST">
            @csrf
            @include('grupos.parts.card_confirmacao_grupo', ['solicitacao' => $solicitacao])
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Confirmar</button>
            </div>
        </form>
    </div>
@vite('resources/css/app.css')
@endsection
