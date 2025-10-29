<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Informações do grupo
    </div>

    <div class="card-body">

        <div class="mb-3">
            <label for="nome" class="form-label">Grupo Confirmado</label>
            <input readonly type="text" name="" class="informacoes-input form-control" id=""
                value="{{ $solicitacao->informacoesGrupo->grupo->nome }}">
        </div>

        <div class="mb-3">
            <label for="descricao" class=" form-label">Informações dos Músicos</label>
            <textarea readonly
                class="informacoes-input form-control p-0 m-0" name="descricao" id="descricao" cols="0"
                rows="5"> {{ $solicitacao->informacoesGrupo->informacoes_musicos }}</textarea>
        </div>
        <div class="mb-3">
            <label for="descricao" class=" form-label">Informações dos Instrumentos</label>
            <textarea readonly
                class="informacoes-input form-control p-0 m-0" name="descricao" id="descricao" cols="0"
                rows="5"> {{ $solicitacao->informacoesGrupo->informacoes_instrumentos }}</textarea>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Coordenador</label>
            <input readonly type="text" class="informacoes-input form-control text-sm"
                value="{{ $solicitacao->informacoesGrupo->grupo->coordenador->user->nome.
                            ' '.$solicitacao->informacoesGrupo->grupo->coordenador->user->sobrenome}}">
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class=" form-label">Telefone Coordenador</label>
                <input readonly type="text" name=""
                    class="informacoes-input form-control" id="cargo_responsavel"
                    value="{{ $solicitacao->informacoesGrupo->grupo->coordenador->user->perfil->telefone ?? 'Nenhum telefone informado' }}">
            </div>
            <div class="mb-3 col-6">
                <label for="cargo_responsavel" class=" form-label">Email Coordenador</label>
                <input readonly type="text" name=""
                    class="informacoes-input form-control" id="cargo_responsavel"
                    value="{{$solicitacao->informacoesGrupo->grupo->coordenador->user->perfil->email ?? 'Nenhum email informado' }}">
            </div>
        </div>
    </div>
</div>
