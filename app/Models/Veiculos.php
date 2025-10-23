<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    protected $table = 'veiculos';


    protected $fillable = [
        'motorista_id',
        'placa',
        'cor',
        'capacidade'
    ];

    public function motorista(){
        return $this->belongsTo(Motorista::class, 'motorista_id', 'id');
    }

    public function solicitacaoTransporte(){
        return $this->belongsToMany(SolicitacaoTransporte::class, 'transporte_veiculos', 'veiculo_id', 'solicitacao_transporte_id');
    }
}
