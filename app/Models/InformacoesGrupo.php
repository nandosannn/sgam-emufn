<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacoesGrupo extends Model
{
    protected $table = 'informacoes_grupo';

    protected $fillable = [
        'grupo_musical_id',
        'solicitacao_id',
        'endereco_musicos_id',
        'informacoes_musicos',
        'informacoes_instrumentos'
    ];

    public function grupo(){
        return $this->belongsTo(GrupoMusical::class, 'grupo_musical_id', 'id');
    }

    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class, 'solicitacao_id', 'id');
    }
}
