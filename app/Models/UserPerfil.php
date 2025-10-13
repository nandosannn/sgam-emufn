<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPerfil extends Model
{
    protected $table = 'user_perfils';

    protected $fillable = [
        'tipoPerfil',
        'ocupacao',
        'telefone',
        'email',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
