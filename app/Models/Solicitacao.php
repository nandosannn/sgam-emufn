<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = 'solicitacao';

    protected $fillable = [
        'evento_id',
        'informacoes_transporte_id',
        'confirmacao_lanche',
        'justificativa',
        'status'
    ];

    public function informacoesGrupo()
    {
        return $this->hasOne(InformacoesGrupo::class, 'solicitacao_id', 'id');
    }

    public function evento(){
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }

     public function transporte(){
        return $this->belongsTo(SolicitacaoTransporte::class, 'informacoes_transporte_id', 'id');
    }


}
