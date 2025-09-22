@extends('layout.default')

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

<div class="container-fluid bg-white p-3 rounded">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{$user->id}}</td>
                <td scope="row">{{$user->name}}</td>
                <td scope="row">{{$user->email}}</td>
                <td scope="row">
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('edit.users', $user)}}" title="editar">
                            <i class="bi bi-gear-fill text-primary"></i>
                        </a>
                        <form action="{{ route('destroy.users', $user)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn p-0 border-0 bg-transparent" title="excluir">
                                <i class="bi bi-trash-fill text-danger"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
