<div class="card">
    <form action="{{route('update.users', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Dados de Usuário
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name') ?? $user->name }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email') ?? $user->email }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}">
                @error('password')
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
