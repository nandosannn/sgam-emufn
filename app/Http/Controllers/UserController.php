<?php

namespace App\Http\Controllers;

use App\Models\CoordenadorGrupo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPerfil;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required',
            'password' => 'required|min:6',
            'ocupacao' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'tipo_perfil' => 'required',
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cpf' => $request->cpf,
            'password' => $request->password,
        ]);

        if ($user) {
            $perfil = UserPerfil::create([
                'ocupacao' => $request->ocupacao,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'tipo_perfil' => $request->tipo_perfil,
                'user_id' => $user->id
            ]);
            if ($perfil) {

                if ($perfil->tipo_perfil == 'coordenador') {
                }
                return redirect()->route('index.users')->with(['status' => 'Usuário cadastrado com sucesso']);
            }
        }

        return redirect()->route('create.users')->with('status', 'Erro ao cadastrar usuário!');
    }

    public function edit(User $user)
    {
        $user->load('perfil');
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $input = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required',
            'password' => 'exclude_if:password,null|min:6'
        ]);

        $user->fill($input);
        $user->save();

        return redirect()->route('index.users')->with('status', 'Usuário editado com sucesso!');
    }

    public function updateProfile(User $user, Request $request)
    {
        $request->validate([
            'tipo_perfil' => 'required',
            'ocupacao' => 'required',
            'telefone' => 'required',
            'email' => 'required|email'
        ]);

        $perfil = UserPerfil::updateOrCreate([
            'user_id' => $user->id
        ], [
            'tipoPerfil' => $request->tipo_perfil,
            'ocupacao' => $request->ocupacao,
            'telefone' => $request->telefone,
            'user_id' => $user->id,
            'email' => $request->email
        ]);

        $coordenador = CoordenadorGrupo::where('user_id', $user->id)->first();
        if ($request->tipo_perfil == 'coordenador') {
            if (!$coordenador) {
                CoordenadorGrupo::create([
                    'user_id' => $user->id,
                    'ativo' => true
                ]);
            } else {
                $coordenador->ativo = true;
                $coordenador->save();
            }
        } else {
            if ($coordenador) {
                $coordenador->ativo = false;
                $coordenador->save();
            }
        }
        return redirect()->route('index.users')->with('status', 'Usuário atualizado com sucesso');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('index.users')->with('status', 'Usuário deletado com sucesso');
    }
}
