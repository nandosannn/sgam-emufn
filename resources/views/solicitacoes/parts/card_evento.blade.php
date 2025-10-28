<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Dados do Evento
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="nome" class=" form-label form-label">Nome do Evento</label>
                <input readonly type="text" name="" class="form-control" id=""
                    value="{{ $solicitacao->evento->nome }}" style="background-color: rgb(247, 247, 247); font-style: italic;">
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Responsável</label>
                <input readonly type="text" class="form-control text-sm"
                    value="{{ $solicitacao->evento->user->nome . ' ' . $solicitacao->evento->user->sobrenome }}"
                    style="background-color: rgb(247, 247, 247); font-style: italic;">
            </div>

        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="data" class="form-label">Data e Hora do Evento:</label>
                <input style="background-color: rgb(247, 247, 247); font-style: italic;" readonly type="datetime-local"
                    class="form-control" id="" name=""
                    value="{{\Carbon\Carbon::parse($solicitacao->evento->data)->format('Y-m-d\TH:i')}}">
            </div>
            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class="form-label">Cargo do Responsável</label>
                <input style="background-color: rgb(247, 247, 247); font-style: italic;" readonly type="text" name=""
                    class="form-control" id="cargo_responsavel"
                    value="{{ $solicitacao->evento->cargo_responsavel ?? 'Não há cargo' }}">
            </div>

        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Evento</label>
            <textarea style="background-color: rgb(247, 247, 247); font-style: italic;" readonly
                class=" form-control p-0 m-0" name="descricao" id="descricao" cols="0"
                rows="5"> {{ $solicitacao->evento->descricao }}</textarea>
        </div>
    </div>
</div>
