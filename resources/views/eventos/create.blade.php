@extends('layout.default')

@section('title-aba', 'SGAM | Adicionar Usuário')

<style>
    .form-control:focus, .form-select:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #1a70c7ff !important;
    }
</style>

@section('content')
    <div class="container-fluid p-5 shadow-sm" style="background-color: #fcfcfcff;">
        <div class="fs-4 fw-bold mb-4">Criar Evento</div>
        <form action="#" method="POST">
            @csrf
            @include('eventos.parts.card_dados_evento', ['user' => $user])
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary text-end">Adicionar</button>
            </div>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0000');
    });
</script>
