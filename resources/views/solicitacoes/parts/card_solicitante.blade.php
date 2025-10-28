<div class="card border-light mb-3">
    <div class="title fs-5 card-header">
        Informações do Solicitante
    </div>

    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-12">
                <label for="nome" class="form-label">Nome</label>
                <input readonly type="text" name="nome" class="form-control"
                    id="nome" value="{{$solicitacao->evento->user->nome.' '.$solicitacao->evento->user->sobrenome }}" style="background-color: rgb(247, 247, 247); font-style: italic;">
            </div>
        </div>
        <div class="mb-3">
            <label for="ocupacao" class="form-label">Ocupação</label>
            <input readonly style="background-color: rgb(247, 247, 247); font-style: italic;" value="{{$solicitacao?->evento?->user?->perfil?->ocupacao ?? 'Ocupação não informada'}}" type="ocupacao" name="ocupacao" id="ocupacao" class="form-control">
        </div>
        <div class="row">
            <div class="mb-3 col-6">
            <label for="telefone" class="form-label">Telefone de Contato</label>
            <input readonly style="background-color: rgb(247, 247, 247); font-style: italic;" type="tel" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
                id="telefone" value="{{$solicitacao?->evento?->user?->perfil?->telefone ?? 'Telefone não informado' }}">
        </div>

        <div class="mb-3 col-6">
            <label for="email" class="form-label">Email</label>
            <input readonly style="background-color: rgb(247, 247, 247); font-style: italic;" type="email" placeholder="Email" name="email" class="form-control"
                id="email" value="{{ $solicitacao?->evento?->user?->perfil?->email ?? 'Email não informado'}}">
        </div>
        </div>


    </div>
