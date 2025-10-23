<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransporteVeiculos extends Model
{
    protected $table = 'transporte_veiculos';

    protected $fillable = [
        'solicitacao_transporte_id',
        'veiculo_id'
    ];

    public function solicitacaoTransporte(){
        return $this->belongsTo(SolicitacaoTransporte::class, 'solicitacao_transporte_id', 'id');
    }

    public function veiculos(){
        return $this->belongsTo(Veiculos::class, 'veiculo_id', 'id');
    }
}
