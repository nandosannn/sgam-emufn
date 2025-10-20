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
        <form action="{{ route('store.grupos') }}" method="POST">
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
                            <label for="data" class="form-label">Dada de Fundação</label>
                            <input type="date" name="data" class="form-control @error('data') is-invalid @enderror"
                                id="data" value="">
                            @error('data')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="coordenador" class="form-label">Coordenador</label>
                        <select class="form-control @error('coordenador') is-invalid @enderror" name="coordenador"
                            id="coordenador">
                            <option value="">Selecione</option>
                            @foreach ($coordenadores as $coordenador)
                                <option value="{{ $coordenador?->id }}"
                                    {{ old('coordenador') == $coordenador->id ? 'selected' : '' }}>
                                    {{ $coordenador?->user?->nome . ' ' . $coordenador?->user?->sobrenome }}
                                </option>
                            @endforeach
                        </select>
                        @error('coordenador')
                            <div class="invalid-feedback d-block">
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
