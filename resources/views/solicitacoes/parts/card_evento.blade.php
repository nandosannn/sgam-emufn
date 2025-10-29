<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Informações do Evento
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Nome do Evento</label>
                <input readonly type="text" name="" class="informacoes-input form-control" id=""
                    value="{{ $solicitacao->evento->nome }}">
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Responsável</label>
                <input readonly type="text" class="informacoes-input form-control text-sm"
                    value="{{ $solicitacao->evento->user->nome . ' ' . $solicitacao->evento->user->sobrenome }}">
            </div>

        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="data" class=" form-label">Data e Hora do Evento:</label>
                <input readonly type="datetime-local"
                    class="informacoes-input form-control" id="" name=""
                    value="{{\Carbon\Carbon::parse($solicitacao->evento->data)->format('Y-m-d\TH:i')}}">
            </div>
            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class=" form-label">Cargo do Responsável</label>
                <input readonly type="text" name=""
                    class="informacoes-input form-control" id="cargo_responsavel"
                    value="{{ $solicitacao->evento->cargo_responsavel ?? 'Não há cargo' }}">
            </div>

        </div>

        <div class="mb-3">
            <label for="descricao" class=" form-label">Descrição do Evento</label>
            <textarea readonly
                class="informacoes-input form-control p-0 m-0" name="descricao" id="descricao" cols="0"
                rows="5"> {{ $solicitacao->evento->descricao }}</textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="logradouro" class=" form-label">Logradouro</label>
                <input readonly type="text" name="logradouro" class="informacoes-input form-control"
                    id="logradouro" value="{{ $solicitacao->evento->endereco->logradouro }}">
            </div>

            <div class="mb-3 col-6">
                <label for="numero" class="form-label">Número</label>
                <input readonly type="text" name="numero" class="informacoes-input form-control"
                    id="numero" value="{{ $solicitacao->evento->endereco->numero }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input readonly type="text" name="bairro" class="informacoes-input form-control"
                id="bairro" value="{{ $solicitacao->evento->endereco->bairro }}">
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input readonly type="text" name="cidade" class="informacoes-input form-control"
                    id="cidade" value="{{ $solicitacao->evento->endereco->cidade }}">
            </div>

            <div class="mb-3 col-6">
                <label for="estado" class="form-label">Estado</label>
                <input readonly type="text" name="estado" class="informacoes-input form-control"
                    id="estado" value="{{ $solicitacao->evento->endereco->estado }}">
            </div>
        </div>
    </div>
</div>
