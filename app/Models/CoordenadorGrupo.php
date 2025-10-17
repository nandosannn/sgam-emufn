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
        return $this->belongsTo(User::class);
    }
}
