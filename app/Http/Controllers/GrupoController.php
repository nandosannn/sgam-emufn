<?php

namespace App\Http\Controllers;

use App\Models\GrupoMusical;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = GrupoMusical::paginate(10);
        return view('grupos.index', compact('grupos'));
    }
}
