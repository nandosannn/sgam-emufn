<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Dados do Evento
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="nome" class=" form-label form-label">Nome do Evento</label>
                <input type="hidden" name="evento_id" class="form-control @error('evento_id') is-invalid @enderror"
                    id="evento_id" value="{{ $evento->id }}">
                <input readonly type="text" name="" class="form-control" id=""
                    value="{{ $evento->nome }}" style="background-color: rgb(247, 247, 247); font-style: italic;">
                @error('evento_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Responsável</label>
                <input readonly type="hidden" name="user_id"
                    class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                    value="{{ $evento->user->id }}">
                <input readonly type="text" class="form-control text-sm"
                    value="{{ $evento->user->nome . ' ' . $evento->user->sobrenome }}"
                    style="background-color: rgb(247, 247, 247); font-style: italic;">
                @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="data" class="form-label">Data e Hora do Evento:</label>
                <input style="background-color: rgb(247, 247, 247); font-style: italic;" readonly type="datetime-local"
                    class="form-control @error('data') is-invalid @enderror" id="" name=""
                    value="{{ old('data', \Carbon\Carbon::parse($evento->data)->format('Y-m-d\TH:i')) }}">
                @error('data')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class="form-label">Cargo do Responsável</label>
                <input style="background-color: rgb(247, 247, 247); font-style: italic;" readonly type="text" name=""
                    class="form-control @error('cargo_responsavel') is-invalid @enderror" id="cargo_responsavel"
                    value="{{ $evento->cargo_responsavel }}">
                @error('cargo_responsavel')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Evento</label>
            <textarea style="background-color: rgb(247, 247, 247); font-style: italic;" readonly
                class=" form-control p-0 m-0 @error('descricao') is-invalid @enderror" name="descricao" id="descricao" cols="0"
                rows="5"> {{ $evento->descricao }}</textarea>
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
        Dados da Solicitação
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="justificativa" class="form-label">Justificativa</label>
            <textarea class="form-control p-0 m-0 @error('justificativa') is-invalid @enderror" name="justificativa"
                id="justificativa" cols="0" rows="5">   </textarea>
            @error('justificativa')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class=" form-label form-label">Status Solicitação</label>
            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror"
                id="status" value="Aguadando disponibilidade de grupo">
            <input readonly type="text" name="" class="form-control" id=""
                value="Aguardando disponibilidade de grupo" style="background-color: rgb(247, 247, 247); font-style: italic;">
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mt-4 mb-3 form-check">
            <input type="checkbox" class="form-check-input @error('confirmacao_lanche') is-invalid @enderror"
                id="confirmacao_lanche" name="confirmacao_lanche" value="1">
            <label class="form-check-label" style="font-style: italic;" for="confirmacao_lanche">Confirmar disponibilidade de lanche para os músicos no evento.</label>

            @error('confirmacao_lanche')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
