@extends('layout.default')

@section('title-aba', 'SGAM | Lista de Grupos')

@section('page-title', 'Grupos')

@section('page-actions')
<a href="#" class="btn btn-primary">Adicionar Grupo</a>
@endsection

@section('content')

@session('status')
<div class="alert alert-success">
    {{ $value }}
</div>
@endsession

<div class="container-fluid p-3 rounded">
    @if (count($grupos) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
            <tr>
                <td scope="row">{{$grupo->id}}</td>
                <td scope="row">{{$grupo->nome}}</td>
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
    @else
    <div class="d-flex justify-content-center">
        <h3>Nenhum grupo cadastrado</h3>
    </div>
    @endif

</div>
<div class="p-3">
    {{ $grupos->links() }}
</div>

@endsection
