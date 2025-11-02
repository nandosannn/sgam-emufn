<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Mudar status da solicitação
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="status" class="form-label">Grupo</label>
            <select class="form-select" name="status" id="status">
                <option value="">Selecione</option>
                <option value="Cancelar solicitacao por falta de transporte" {{ old('status') == 'Cancelar solicitacao por falta de transporte' ? 'selected' : '' }}>
                    Cancelar solicitacao por falta de transporte
                </option>
                <option value="Cancelar solicitacao por falta de grupo" {{ old('status') == 'Cancelar solicitacao por falta de grupo' ? 'selected' : '' }}>
                    Cancelar solicitacao por falta de grupo
                </option>
                <option value="Concluir solicitacao" {{ old('status') == 'Concluir solicitacao' ? 'selected' : '' }}>
                    Concluir solicitação
                </option>
                <option value="Evento confirmado" {{ old('status') == 'Evento confirmado' ? 'selected' : '' }}>
                    Evento confirmado
                </option>
            </select>
        </div>
    </div>
    <div class="bg-white card-footer text-end mb-2">
        <button type="submit" style="font-weight: bold" class="btn btn-danger text-end">Alterar</button>
    </div>
</div>
