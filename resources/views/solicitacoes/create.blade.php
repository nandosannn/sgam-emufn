@extends('layout.default')

@section('title-aba', 'SGAM | Fazer Solicitação')

@section('content')

<style>
    .form-control:focus, .form-select:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #164194 !important;
    }
    .btn-primary{
        background-color: #164194 !important;
        border: none !important
    }

    .btn-primary:hover {
        background-color: #0095DB !important;
        border: none
    }

    .font {
        font-family: 'Liberation Sans', Arial, sans-serif !important;
        font-size: 0.875rem !important; /* ~14px */
    }
</style>

@session('error')
<div class="alert alert-danger">
    {{ $value }}
</div>
@endsession
    <div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Solicitar Apresentação Musical</div>
        <form action="{{route('store.eventos')}}" method="POST">
            @csrf
            @include('solicitacoes.parts.card_dados_solicitacao', ['evento' => $evento])
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Solicitar</button>
            </div>
        </form>
    </div>
@endsection
