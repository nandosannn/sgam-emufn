<div class="card border-light mb-3">
    <div class="title fs-5 card-header">
        Informações do Solicitante
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-12">
                <label for="nome" class="form-label">Nome</label>
                <input readonly type="text" name="nome" class="informacoes-input form-control"
                    id="nome" value="{{$solicitacao->evento->user->nome.' '.$solicitacao->evento->user->sobrenome }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="ocupacao" class="form-label">Ocupação</label>
            <input readonly value="{{$solicitacao?->evento?->user?->perfil?->ocupacao ?? 'Ocupação não informada'}}" type="ocupacao" name="ocupacao" id="ocupacao" class="informacoes-input form-control">
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="telefone" class="form-label">Telefone de Contato</label>
                <input readonly type="tel" name="telefone" class="informacoes-input form-control"
                    id="telefone" value="{{$solicitacao?->evento?->user?->perfil?->telefone ?? 'Telefone não informado' }}">
            </div>

            <div class="mb-3 col-6">
                <label for="email" class="form-label">Email</label>
                <input readonly type="email" placeholder="Email" name="email" class="informacoes-input form-control"
                    id="email" value="{{ $solicitacao?->evento?->user?->perfil?->email ?? 'Email não informado'}}">
            </div>
        </div>


    </div>
</div>
