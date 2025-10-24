
<div class="font card">
    <form action="{{ route('update.users', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="title fs-5 card-header">
            Dados de Usuário
        </div>

        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                        id="nome" value="{{ old('name') ?? $user->nome }}">
                    @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" name="sobrenome" class="form-control @error('sobrenome') is-invalid @enderror"
                        id="sobrenome" value="{{ old('sobrenome') ?? $user->sobrenome }}">
                    @error('sobrenome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input readonly type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                    id="cpf" value="{{ old('cpf') ?? $user->cpf }}" style="background-color: rgb(240, 240, 240)">
                @error('cpf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary text-end">Editar</button>
        </div>
    </form>
</div>

