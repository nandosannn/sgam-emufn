<?php

namespace App\Http\Controllers;

use App\Models\CoordenadorGrupo;
use App\Models\GrupoMusical;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
         $query = GrupoMusical::with('coordenador');

        if($request->filled('nome')){
            $query->where('nome', 'like', '%'.$request->nome.'%');
        }


        $grupos = $query->paginate(8);
        return view('grupos.index', compact('grupos'));
    }

    public function create(){
        $coordenadores = CoordenadorGrupo::with('user')->where('ativo', true)->get();
        return view('grupos.create', compact('coordenadores'));
    }
}
