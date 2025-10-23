<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoTransporte extends Model
{
    protected $table = 'solicitacao_transporte';

    protected $fillable = [
        'status',
        'descricao',
        'horarioIda',
        'horarioVolta'
    ];

    public function veiculos(){
        return $this->belongsToMany(Veiculos::class, 'transporte_veiculos', 'solicitacao_transporte_id', 'veiculo_id');
    }

    public function solicitacao(){
        return $this->hasOne(Solicitacao::class, 'informacoes_transporte_id', 'id');
    }
}
