<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Cancelar Grupo
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="status" class="form-label">Grupo</label>
            <select class="form-select" name="status" id="status">
                <option value="">Selecione</option>
                <option value="Cancelar solicitacao" {{ old('status') == 'Cancelar solicitacao' ? 'selected' : '' }}>
                    Cancelar solicitacao
                </option>
                <option value="Cancelar transporte" {{ old('status') == 'Cancelar transporte' ? 'selected' : '' }}>
                    Cancelar transporte
                </option>
            </select>
        </div>
    </div>
    <div class="bg-white card-footer text-end mb-2">
        <button type="submit" style="font-weight: bold" class="btn btn-danger text-end">Cancelar</button>
    </div>
</div>
