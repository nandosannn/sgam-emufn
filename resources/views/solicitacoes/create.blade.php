@extends('layout.default')

@section('title-aba', 'SGAM | Fazer Solicitação')

@section('content')

@session('error')
<div class="alert alert-danger">
    {{ $value }}
</div>
@endsession
    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Solicitar Apresentação Musical</div>
        <form action="{{route('store.silicitacoes')}}" method="POST">
            @csrf
            @include('solicitacoes.parts.card_dados_solicitacao', ['evento' => $evento])
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Solicitar</button>
            </div>
        </form>
    </div>
@vite('resources/css/app.css')
@endsection
