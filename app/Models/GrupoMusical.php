<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoMusical extends Model
{
    protected $table = 'grupo_musical';

    protected $fillable = [
        'nome',
        'dataFundacao',
        'coordenador_id',
        'ativo'
    ];

    public function coordenador()
    {
        return $this->belongsTo(CoordenadorGrupo::class, 'coordenador_id', 'id');
    }

    public function informacoesGrupo()
    {
        return $this->hasMany(InformacoesGrupo::class, 'grupo_musical_id', 'id');
    }
}
