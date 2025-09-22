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


}
