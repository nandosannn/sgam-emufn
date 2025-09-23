<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(){

        return view('users.create');

    }

    public function store(Request $request){

        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($input);

        return redirect()->route('index.users')->with(['status' => 'Usuário cadastrado com sucesso']);

    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:6'
        ]);

        $user->fill($input);
        $user->save();

        return redirect()->route('index.users')->with('status', 'Usuário editado com sucesso!');
    }

    public function updateProfile(User $user, Request $request){
        dd($request->all());
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('index.users')->with('status', 'Usuário deletado com sucesso');
    }


}
