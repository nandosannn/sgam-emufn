<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $query = Evento::with('user', 'endereco');

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
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

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cargo_responsavel' => ['required', 'string', 'max:255'],
            'data' => ['required', 'date_format:Y-m-d\TH:i'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'descricao' => ['required', 'string', 'max:5000'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:10'],
            'bairro' => ['required', 'string', 'max:100'],
            'cidade' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string', 'min:2', 'max:40'],
        ]);

        $endereco = Endereco::create([
            'numero' => $request->numero,
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado
        ]);

        if ($endereco) {
            $evento = Evento::create([
                'user_id' => $request->user_id,
                'endereco_id' => $endereco->id,
                'nome' => $request->nome,
                'descricao'  => $request->descricao,
                'data' => $request->data,
                'cargo_responsavel' =>  $request->cargo_responsavel
            ]);

            if ($evento) {
                return redirect()->route('index.eventos')->with(['status' => 'Evento cadastrado com sucesso']);
            }
        }
        return redirect()->route('create.eventos')->with(['error' => 'Evento não cadastrado!']);
    }
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cargo_responsavel' => ['required', 'string', 'max:255'],
            'data' => ['required', 'date_format:Y-m-d\TH:i'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'descricao' => ['required', 'string', 'max:5000'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:10'],
            'bairro' => ['required', 'string', 'max:100'],
            'cidade' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string', 'min:2', 'max:40'],
        ]);

        $endereco = Endereco::find($evento->endereco_id);

        if ($endereco) {
            $endereco->update([
                'numero' => $request->numero,
                'logradouro' => $request->logradouro,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado
            ]);

            $evento->update([
                'user_id' => $request->user_id,
                'endereco_id' => $endereco->id,
                'nome' => $request->nome,
                'descricao'  => $request->descricao,
                'data' => $request->data,
                'cargo_responsavel' =>  $request->cargo_responsavel
            ]);

            return redirect()->route('index.eventos')->with(['status' => 'Evento atualizado com sucesso']);
        }
        return redirect()->route('edit.eventos', $evento)->with(['error' => 'Evento não cadastrado!']);
    }

    public function destroy(Evento $evento){

        $evento->delete();
        return redirect()->route('index.eventos')->with('status', 'Evento excluído com sucesso');
    }
}
