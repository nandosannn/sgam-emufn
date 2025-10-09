<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPerfil;

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

        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($input);

        return redirect()->route('index.users')->with(['status' => 'Usuário cadastrado com sucesso']);
    }

    public function edit(User $user)
    {
        $user->load('perfil');
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
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
            'email' => 'required'
        ]);

        UserPerfil::updateOrCreate([
            'user_id' => $user->id
        ], [
            'tipoPerfil' => $request->tipo_perfil,
            'ocupacao' => $request->ocupacao,
            'telefone' => $request->telefone,
            'user_id' => $user->id,
            'email' => $request->email
        ]);

        return redirect()->route('index.users')->with('status', 'Usuário deletado com sucesso');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('index.users')->with('status', 'Usuário deletado com sucesso');
    }
}
