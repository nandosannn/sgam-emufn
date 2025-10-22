@extends('layout.default')

@section('title-aba', 'SGAM | Editar Evento')

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
    <div class="container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Editar Evento</div>
        <form action="{{route('update.eventos', $evento)}}" method="POST">
            @method('PUT')
            @csrf
            @include('eventos.parts.card_edit_evento', ['evento' => $evento])
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Editar</button>
            </div>
        </form>
    </div>
@endsection
