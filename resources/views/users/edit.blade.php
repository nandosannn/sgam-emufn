@extends('layout.default')
@section('title-aba', 'SGAM | Editar Usuário')

@section('content')

<div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
    <div class="fs-4 fw-bold mb-4">Editar Usuário</div>
    @include('users.parts.basic-details')
    <br>
    @include('users.parts.profile')
</div>
@vite('resources/css/app.css')
@endsection
