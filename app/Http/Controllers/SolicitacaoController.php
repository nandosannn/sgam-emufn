<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function create(Evento $evento){
        return view('solicitacoes.create', compact('evento'));
    }

    public function store(Request $request){
        
    }
}
