<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Dados do Transporte
    </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="solicitacao_transporte_id" class=" form-label form-label">Solicitação</label>
                <input type="hidden" name="solicitacao_transporte_id"
                    class="form-control @error('solicitacao_transporte_id') is-invalid @enderror"
                    id="solicitacao_transporte_id" value="{{ $solicitacao->id }}">
                <input readonly type="text" name="" class="form-control" id=""
                    value="Solicitação Evento 0{{ $solicitacao->id }}/{{ date('Y') }}"
                    style="background-color: rgb(247, 247, 247); font-style: italic;">
                @error('solicitacao_transporte_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control p-0 m-0 @error('descricao') is-invalid @enderror" name="descricao" id="descricao"
                    cols="0" rows="5">   </textarea>
                @error('descricao')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="horarioIda" class="form-label">Data e Hora Ida</label>
                    <input type="datetime-local" class="form-control @error('horarioIda') is-invalid @enderror"
                        id="horarioIda" name="horarioIda" value="{{ old('horarioIda') }}">
                    @error('horarioIda')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="horarioVolta" class="form-label">Data e Hora Volta</label>
                    <input type="datetime-local" class="form-control @error('horarioVolta') is-invalid @enderror"
                        id="horarioVolta" name="horarioVolta" value="{{ old('horarioVolta') }}">
                    @error('horarioVolta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="nome_motorista" class="form-label">Nome do motorista</label>
                    <input type="text" class="form-control @error('nome_motorista') is-invalid @enderror"
                        id="nome_motorista" name="nome_motorista" value="{{ old('nome_motorista') }}">
                    @error('nome_motorista')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="telefone" class="form-label">Telefone do motorista</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                        name="telefone" value="{{ old('telefone') }}">
                    @error('telefone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="cnh" class="form-label">CNH do motorista</label>
                    <input type="text" class="form-control @error('cnh') is-invalid @enderror" id="cnh"
                        name="cnh" value="{{ old('cnh') }}">
                    @error('telefone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="placa" class="form-label">Placa do veículo</label>
                    <input type="text" class="form-control @error('placa') is-invalid @enderror" id="placa"
                        name="placa" value="{{ old('placa') }}">
                    @error('placa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="cor" class="form-label">Cor do veículo</label>
                    <input type="text" class="form-control @error('cor') is-invalid @enderror" id="cor"
                        name="cor" value="{{ old('cor') }}">
                    @error('cor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="capacidade" class="form-label">Capacidade do veículo</label>
                    <input type="text" class="form-control @error('capacidade') is-invalid @enderror"
                        id="capacidade" name="capacidade" value="{{ old('capacidade') }}">
                    @error('capacidade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
</div>
