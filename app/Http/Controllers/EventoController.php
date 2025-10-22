<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create()
    {
        $user = User::where('cpf', Auth::user()->cpf)->first();

        // Apenas a string 'user', sem o array e sem a atribuição de valor.
        return view('eventos.create', compact('user'));
    }
}
