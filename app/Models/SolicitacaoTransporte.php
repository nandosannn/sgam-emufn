<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoTransporte extends Model
{
    protected $table = 'solicitacao_transporte';

    protected $fillable = [
        'status',
        'descricao',
        'veiculo_id',
        'horarioIda',
        'horarioVolta'
    ];

    public function veiculos(){
        return $this->belongsTo(Veiculos::class, 'veiculo_id', 'id');
    }

    public function solicitacao(){
        return $this->hasOne(Solicitacao::class, 'informacoes_transporte_id', 'id');
    }
}
