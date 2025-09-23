<div class="card">
    <form action="{{route('updateprofile.users', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Perfil
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="type" class="form-label">Tipo do Perfil</label>
                <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ocupacao" class="form-label">Ocupação</label>
                <input type="ocupacao" name="ocupacao" id="ocupacao" class="form-control @error('ocupacao') is-invalid @enderror">
                @error('ocupacao')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Telefone de Contato</label>
                <input type="tel" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" placeholder="(99) 99999-9999" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    id="address" value="{{ old('phone')}}">
                @error('phone')
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
