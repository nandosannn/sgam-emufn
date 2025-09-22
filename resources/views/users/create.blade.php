@extends('layout.default')

@section('page-title', 'Adicionar Usuário')

@section('content')
<div class="container-fluid bg-white p-3 rounded">
    <form action="{{ route('store.users') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!--
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        -->
        <button type="submit" class="btn btn-primary text-end">Adicionar</button>
    </form>
</div>
@endsection
