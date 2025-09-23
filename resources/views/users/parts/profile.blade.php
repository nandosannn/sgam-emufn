<div class="card">
    <form action="{{route('updateprofile.users', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Perfil
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Tipo de Pessoa</label>
                <select
                    name="type"
                    id="type"
                    class="form-control @error('type') is-invalid @enderror"
                >
                    <option value="">Selecione</option>
                    <option value="PJ">PJ</option>
                    <option value="PF">PF</option>
                </select>
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" name="address" class="form-control @error('email') is-invalid @enderror"
                    id="address" value="{{ old('address')}}">
                @error('address')
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
