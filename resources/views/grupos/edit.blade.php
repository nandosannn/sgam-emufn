@extends('layout.default')
@section('title-aba', 'SGAM | Editar Grupo')

@section('content')
<div class="container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
    @include('grupos.parts.form_grupo')
</div>
@endsection
