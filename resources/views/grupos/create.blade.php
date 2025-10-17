@extends('layout.default')

@section('title-aba', 'SGAM | Adicionar Usuário')

<style>
    .form-control:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #1a70c7ff !important;
    }
</style>

@section('content')
    <div class="container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Adicionar Grupo</div>
        <form action="{{ route('store.users') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header fs-5">
                    Dados do Grupo
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                                id="name" value="">
                            @error('nome')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-6">
                            <label for="coordenador" class="form-label">Coordenador</label>
                            <select class="form-control" name="coordenador" id="coordenador">
                                <option value="">Selecione</option>
                                @foreach ($coordenadores as $coordenador)
                                    <option value="{{$coordenador?->id}}">{{ $coordenador?->user?->nome }}</option>
                                @endforeach
                            </select>
                            @error('sobrenome')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                            id="cpf" value="">
                        @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" value="">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Adicionar</button>
            </div>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0000');
    });
</script>
