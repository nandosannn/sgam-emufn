<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    protected $fillable = [
        'numero',
        'logradouro',
        'bairro',
        'cidade',
        'estado'
    ];

    public function evento(){
        return $this->hasMany(Evento::class, 'endereco_id', 'id');
    }

    public function informacoesGrupo(){
        return $this->hasMany(InformacoesGrupo::class, 'endereco_musicos_id', 'id');
    }
}
