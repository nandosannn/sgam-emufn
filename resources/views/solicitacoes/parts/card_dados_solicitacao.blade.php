<style>
    .form-label{
        color: #164194 !important
    }

    .title{
        font-style: italic;
    }

    label {
        font-size: 1rem !important;
    }
</style>

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
                    value="{{ $evento->nome }}" style="background-color: rgb(247, 247, 247)">
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
                    style="background-color: rgb(247, 247, 247)">
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
                <input style="background-color: rgb(247, 247, 247)" readonly type="datetime-local"
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
                <input style="background-color: rgb(247, 247, 247)" readonly type="text" name=""
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
            <textarea style="background-color: rgb(247, 247, 247)" readonly
                class=" form-control p-0 m-0 @error('descricao') is-invalid @enderror" name="descricao" id="descricao" cols="0"
                rows="5">  {{ $evento->descricao }}</textarea>

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
                <label for="cargo_responsavel" class="form-label">Cargo Responsável</label>
                <input type="text" name="cargo_responsavel"
                    class="form-control @error('cargo_responsavel') is-invalid @enderror" id="cargo_responsavel"
                    value="">
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
                    name="data" value="{{ old('data') }}">
                @error('data')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Responsável</label>
                <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                    id="user_id" value="">
                <input readonly type="text" class="form-control" value=""
                    style="background-color: rgb(247, 247, 247)">
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
