 <form action="{{route('update.grupos', $grupo)}}" method="POST">
    @method('PUT')
     @csrf
     <div class="card mb-3">
         <div class="card-header fs-5">
             Dados do Grupo
         </div>

         <div class="card-body">
             <div class="row">
                 <div class="mb-3 col-6">
                     <label for="nome" class="form-label">Nome</label>
                     <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                         id="name" value="{{$grupo->nome}}">
                     @error('nome')
                         <div class="invalid-feedback">
                             {{ $message }}
                         </div>
                     @enderror
                 </div>

                 <div class="mb-3 col-6">
                     <label for="data" class="form-label">Dada de Fundação</label>
                     <input type="date" name="data" class="form-control @error('data') is-invalid @enderror"
                         id="data" value="{{$grupo->dataFundacao}}">
                     @error('data')
                         <div class="invalid-feedback">
                             {{ $message }}
                         </div>
                     @enderror
                 </div>
             </div>
             <div class="mb-3">
                 <label for="coordenador" class="form-label">Coordenador</label>
                 <select class="form-control @error('coordenador') is-invalid @enderror" name="coordenador"
                     id="coordenador">
                     <option value="">Selecione</option>
                     @foreach ($coordenadores as $coordenador)
                         <option value="{{ $coordenador?->id }}"
                             {{ $grupo->coordenador->id == $coordenador->id ? 'selected' : '' }}>
                             {{ $coordenador?->user?->nome . ' ' . $coordenador?->user?->sobrenome }}
                         </option>
                     @endforeach
                 </select>
                 @error('coordenador')
                     <div class="invalid-feedback d-block">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
         </div>
     </div>
     <div class="card-footer text-end">
         <button type="submit" class="btn btn-primary text-end">Editar</button>
     </div>
 </form>
