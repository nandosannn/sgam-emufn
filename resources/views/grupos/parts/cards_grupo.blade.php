<div class="card shadow-sm border-0" style="width: 20rem;">
    <div class="card-body">
        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-music-note-beamed fs-4 text-primary"></i>
            <h5 class="fs-4 p-0 m-0 fw-bold text-break">{{$grupo->nome}}</h5>
        </div>
        <p class="fst-italic mb-4 text-break"><strong>Coordenador: </strong>{{$grupo?->coordenador?->user?->nome.' '.$grupo?->coordenador?->user?->sobrenome}}</p>

        <div class="d-flex justify-content-start gap-2 mt-3">
            <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash-fill"></i> Excluir
                </button>
            </form>

            <a href="#" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-gear-fill"></i> Editar
            </a>
        </div>
    </div>
</div>
