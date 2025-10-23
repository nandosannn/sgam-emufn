<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoordenadorGrupo extends Model
{
    protected $table = 'coordenador_grupo';

    protected $fillable = [
        'user_id',
        'ativo'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function grupo()
    {
        return $this->hasMany(GrupoMusical::class, 'coordenador_id', 'id');
    }
}
