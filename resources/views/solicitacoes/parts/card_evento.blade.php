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
                <input readonly type="datetime-local" class="informacoes-input form-control" id=""
                    name=""
                    value="{{ \Carbon\Carbon::parse($solicitacao->evento->data)->format('Y-m-d\TH:i') }}">
            </div>
            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class=" form-label">Cargo do Responsável</label>
                <input readonly type="text" name="" class="informacoes-input form-control"
                    id="cargo_responsavel" value="{{ $solicitacao->evento->cargo_responsavel ?? 'Não há cargo' }}">
            </div>

        </div>

        <div class="mb-3">
            <label for="descricao" class=" form-label">Descrição do Evento</label>
            <textarea readonly class="informacoes-input form-control p-0 m-0" name="descricao" id="descricao" cols="0"
                rows="5"> {{ $solicitacao->evento->descricao }}</textarea>
        </div>
        <div class="mb-3">
            <label for="endereco" class=" form-label">Endereço</label>
            <textarea readonly class="informacoes-input form-control p-0 m-0 text-break" name="endereco" id="endereco" cols="0"
                rows="5"> Rua: {{$solicitacao->evento->endereco->logradouro}}, número: {{$solicitacao->evento->endereco->numero}}, {{$solicitacao->evento->endereco->bairro}}, {{$solicitacao->evento->endereco->cidade}} - {{$solicitacao->evento->endereco->estado}}</textarea>
        </div>
    </div>
</div>
