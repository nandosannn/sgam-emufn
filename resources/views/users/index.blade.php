@extends('layout.default')

@section('title-aba', 'SGAM | Lista de Usuários')

@section('page-title', 'Usuários')

@section('page-actions')
<a href="{{ route('create.users') }}" class="btn btn-primary">Adicionar Usuário</a>
@endsection

@section('content')

@session('status')
<div class="alert alert-success">
    {{ $value }}
</div>
@endsession
<div class="container-fluid p-3">
    <div class="row gap-4">
        @foreach($users as $user)
        @include('users.parts.card_usuario', ['user' => $user])
        @endforeach
    </div>
</div>
<div class="p-3">
    {{ $users->links() }}
</div>


@endsection
