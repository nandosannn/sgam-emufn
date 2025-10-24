@extends('layout.default')
@section('title-aba', 'SGAM | Editar Usuário')
@section('page-title', 'Editar Usuário')

@section('content')
<style>
    .form-control:focus,
    .form-select:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #164194 !important;
    }

    .btn-primary {
        background-color: #164194 !important;
        border: none !important
    }

    .btn-primary:hover {
        background-color: #0095DB !important;
        border: none
    }

    .font {
        font-family: 'Liberation Sans', Arial, sans-serif !important;
        font-size: 0.875rem !important;
        /* ~14px */
    }

    .form-label {
        color: #164194 !important
    }

    .title {
        font-style: italic;
    }

    label {
        font-size: 1rem !important;
    }
</style>
@include('users.parts.basic-details')
<br>
@include('users.parts.profile')

@endsection
