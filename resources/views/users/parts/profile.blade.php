<div class="card">
    <form action="{{route('updateprofile.users', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Perfil
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="tipo_perfil" class="form-label">Tipo</label>
                <select class="form-control @error('tipo_perfil') is-invalid @enderror" name="tipo_perfil" id="tipo_perfil">
                    @foreach (['solicitante', 'coordenador', 'administrador'] as $item)
                        <option
                            value="{{$item}}"
                            @selected(old('tipo_perfil') ===  $item || $user?->perfil?->tipoPerfil === $item)
                        >
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_perfil')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ocupacao" class="form-label">Ocupação</label>
                <input value="{{old('ocupacao') ?? $user?->perfil?->ocupacao}}" type="ocupacao" name="ocupacao" id="ocupacao" class="form-control @error('ocupacao') is-invalid @enderror">
                @error('ocupacao')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone de Contato</label>
                <input type="tel" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" placeholder="(99) 99999-9999" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
                    id="telefone" value="{{ old('telefone') ?? $user?->perfil?->telefone}}">
                @error('telefone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary text-end">Editar</button>
        </div>
    </form>
</div>




</form>
