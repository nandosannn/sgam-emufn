<div class="card border-light mb-3">
    <div class="title card-header fs-5">
        Informações do Grupo
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="solicitacao" class=" form-label form-label">Status Solicitação</label>
            <input type="hidden" name="solicitacao_id" class="form-control @error('solicitacao_id') is-invalid @enderror"
                id="solicitacao_id" value="{{ $solicitacao->id }}">
            <input readonly type="text" name="" class="form-control" id="solicitacao"
                value="Solicitação Evento 0{{$solicitacao->id }}/{{ date('Y')}}" style="background-color: rgb(247, 247, 247); font-style: italic;">
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="informacoes_musicos" class="form-label">Informações dos Músicos</label>
            <textarea class="form-control p-0 m-0 @error('informacoes_musicos') is-invalid @enderror" name="informacoes_musicos"
                id="informacoes_musicos" cols="0" rows="5">   </textarea>
            @error('informacoes_musicos')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="informacoes_instrumentos" class="form-label">Informações dos Instrumentos</label>
            <textarea class="form-control p-0 m-0 @error('informacoes_instrumentos') is-invalid @enderror" name="informacoes_instrumentos"
                id="informacoes_instrumentos" cols="0" rows="5">   </textarea>
            @error('informacoes_instrumentos')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        @if (count($grupos)>0)
        <div class="mb-3">
            <label for="grupo_musical_id" class="form-label">Grupo</label>
            <select class="form-select @error('grupo_musical_id') is-invalid @enderror" name="grupo_musical_id"
                id="grupo_musical_id">
                <option value="">Selecione</option>
                @foreach ($grupos as $grupo)
                <option value="{{ $grupo->id }}"
                    {{ old('grupo_musical_id') == $grupo->id ? 'selected' : '' }}>
                    {{ $grupo->nome}}
                </option>
                @endforeach
            </select>
            @error('grupo_musical_id')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        @else
        <div class="mb-3">
            <label for="grupo_musical_id" class=" form-label form-label">Grupo</label>
            <input type="hidden" name="grupo_musical_id" class="form-control @error('grupo_musical_id') is-invalid @enderror"
                id="grupo_musical_id" value="">
            <input readonly type="text" name="" class="form-control" id=""
                value="Você não coordena nenhum grupo" style="background-color: rgb(247, 247, 247); font-style: italic;">
            @error('grupo_musical_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        @endif

    </div>
</div>
