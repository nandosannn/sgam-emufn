@extends('layout.default')

@section('page-title', 'Usuários')

@section('page-actions')
    <a href="#" class="btn btn-primary">Adicionar Usuários</a>
@endsection

@section('content')

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
                        <a href="#" title="editar">
                            <i class="bi bi-gear-fill text-primary"></i>
                        </a>
                        <form action="#">
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
