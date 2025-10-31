<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';

    protected $fillable = [
        'user_id',
        'endereco_id',
        'nome',
        'descricao',
        'data',
        'cargo_responsavel'
    ];

    public function user(){
        return $this->belongsTo(User::class,   'user_id', 'id');
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');
    }

    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class, 'evento_id', 'id');
    }
}
