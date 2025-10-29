<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Informações do Transporte
    </div>

    <div class="card-body">
        @foreach ($solicitacao->transporte->veiculos as $veiculo)
        <div class="row">
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Nome do Motorista</label>
                <input readonly type="text" name="" class="informacoes-input form-control" id=""
                    value="{{ $veiculo->motorista->nome }}">
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Telefone</label>
                <input readonly type="text" class="informacoes-input form-control text-sm"
                    value="{{ $veiculo->motorista->telefone }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Placa do Veículo</label>
                <input readonly type="text" name="" class="informacoes-input form-control" id=""
                    value="{{ $veiculo->motorista->nome }}">
            </div>
            <div class="mb-3 col-6">
                <label for="user_id" class="form-label">Cor do Veículo</label>
                <input readonly type="text" class="informacoes-input form-control text-sm"
                    value="{{ $veiculo->cor }}">
            </div>
        </div>
        @endforeach
    </div>
</div>
