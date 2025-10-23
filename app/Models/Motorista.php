<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $table = 'motorista';


    protected $fillable = [
        'cnh',
        'nome_motorista'
    ];

    public function veiculo(){
        return $this->hasMany(Veiculos::class, 'motorista_id', 'id');
    }
}
