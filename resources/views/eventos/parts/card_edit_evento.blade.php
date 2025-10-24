<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Dados do Evento
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                    id="name" value="{{ $evento->nome }}">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class="form-label">Cargo Responsável</label>
                <input type="text" name="cargo_responsavel" class="form-control @error('cargo_responsavel') is-invalid @enderror"
                    id="cargo_responsavel" value="{{ $evento->cargo_responsavel }}">
                @error('cargo_responsavel')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="data" class="form-label">Data e Hora do Evento:</label>
                <input type="datetime-local" class="form-control @error('data') is-invalid @enderror" id="data"
                    name="data"
                    value="{{ old('data', \Carbon\Carbon::parse($evento->data)->format('Y-m-d\TH:i')) }}">
                @error('data')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Responsável</label>
                <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                    id="user_id" value="{{ $evento->user->id }}">
                <input readonly type="text" class="form-control"
                    value="{{ $evento->user->nome . ' ' . $evento->user->sobrenome }}"
                    style="background-color: rgb(247, 247, 247)">
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Evento</label>
            <textarea class="form-control p-0 m-0 @error('descricao') is-invalid @enderror" name="descricao" id="descricao" cols="0"
                rows="5">
            {{ $evento->descricao }}
            </textarea>

            @error('descricao')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>

<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Dados do Endereco
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror"
                    id="logradouro" value="{{ $evento->endereco->logradouro }}">
                @error('logradouro')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label for="numero" class="form-label">Número</label>
                <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror"
                    id="numero" value="{{ $evento->endereco->numero }}">
                @error('numero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror"
                id="bairro" value="{{ $evento->endereco->bairro }}">
            @error('bairro')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                    id="cidade" value="{{ $evento->endereco->cidade }}">
                @error('cidade')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror"
                    id="estado" value="{{ $evento->endereco->estado }}">
                @error('estado')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
