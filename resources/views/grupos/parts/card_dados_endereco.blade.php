<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Dados do Endereço para Buscar os Músicos
    </div>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror"
                    id="logradouro" value="">
                @error('logradouro')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label for="numero" class="form-label">Número</label>
                <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror"
                    id="numero" value="">
                @error('numero')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror"
                id="bairro" value="">
            @error('bairro')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                    id="cidade" value="">
                @error('cidade')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror"
                    id="estado" value="">
                @error('estado')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
