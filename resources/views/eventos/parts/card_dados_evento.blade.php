<div class="card mb-3">
    <div class="card-header fs-5">
        Dados do Evento
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-12">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                    id="name" value="">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="data" class="form-label">Data e Hora do Evento:</label>
                <input type="datetime-local" class="form-control @error('data') is-invalid @enderror"
                    id="data" name="data" value="{{ old('data') }}">
                @error('data')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Responsável</label>
                <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                    id="user_id" value="{{ $user->id }}">
                <input readonly type="text" class="form-control" value="{{ $user->nome . ' ' . $user->sobrenome }}"
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
            <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao" cols="0"
                rows="5">

            </textarea>

            @error('descricao')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
