@extends('layout.default')
@section('title-aba', 'SGAM | Editar Grupo')

@section('content')
<div class="font container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
    <div class="fs-4 fw-bold mb-4">Editar Grupo</div>
    @include('grupos.parts.form_grupo')
</div>
@vite('resources/css/app.css')
@endsection
