@extends('layout.default')
@section('title-aba', 'SGAM | Editar Usuário')
@section('page-title', 'Editar Usuário')

@section('content')

    @include('users.parts.basic-details')
    <br>
    @include('users.parts.profile')

@endsection
