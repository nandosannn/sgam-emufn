<style>
    .form-control:focus, .form-select:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #1a70c7ff !important;
    }
</style>

<div class="card">
    <form action="{{route('updateprofile.users', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Perfil
        </div>

        <div class="card-body">
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

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email') ?? $user?->perfil?->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipoPerfil" class="form-label">Tipo do Perfil</label>
                <select name="tipo_perfil" id="tipo_perfil" class="form-select @error('tipo_perfil') is-invalid @enderror">
                    <option value="solicitante" {{ $user?->perfil?->tipoPerfil == 'solicitante' ? 'selected' : '' }}>Solicitante</option>
                    <option value="coordenador" {{ $user?->perfil?->tipoPerfil == 'coordenador' ? 'selected' : '' }}>Coordenador</option>
                </select>
                @error('tipo_perfil')
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
    $('#telefone').mask('(00) 00000-0000');
});
</script>
