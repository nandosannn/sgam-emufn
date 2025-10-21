<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request){
        $query = Evento::with('user', 'endereco');

        if($request->filled('nome')){
            $query->where('nome', 'like', '%'.$request->nome.'%');
        }

        $eventos = $query->paginate(8);
        return view('eventos.index', compact('eventos'));
    }
}
