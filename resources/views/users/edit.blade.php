@extends('layout.default')

@section('page-title', 'Editar Usuário')

@section('content')

    @include('users.parts.basic-details')
    <br>
    @include('users.parts.profile')

@endsection
