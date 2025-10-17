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
        <div class="fs-4 fw-bold mb-4">Adicionar Usuário</div>
        <form action="{{ route('store.users') }}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header fs-5 ">
                    Dados de Usuário
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
                            <label for="sobrenome" class="form-label">Sobrenome</label>
                            <input type="text" name="sobrenome"
                                class="form-control @error('sobrenome') is-invalid @enderror" id="sobrenome" value="">
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

            <div class="card mb-3">
                <div class="card-header fs-5">
                    Perfil
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="ocupacao" class="form-label">Ocupação</label>
                        <input value="" type="ocupacao" name="ocupacao" id="ocupacao"
                            class="form-control @error('ocupacao') is-invalid @enderror">
                        @error('ocupacao')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone de Contato</label>
                        <input type="tel" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" placeholder="(99) 99999-9999"
                            name="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                            value="">
                        @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" placeholder="Email" name="email"
                            class="form-control @error('email') is-invalid @enderror" id="email" value="">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tipoPerfil" class="form-label">Tipo do Perfil</label>
                        <select name="tipo_perfil" id="tipo_perfil"
                            class="form-control @error('tipo_perfil') is-invalid @enderror">
                            <option value="solicitante">Solicitante</option>
                            <option value="coordenador">Coordenador</option>
                        </select>
                        @error('tipo_perfil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Criar Usuário</button>
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
