<?php

namespace App\Http\Controllers;

use App\Models\CoordenadorGrupo;
use App\Models\GrupoMusical;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPerfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Commands\AssignRole;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('perfil')->where('cpf', '!=', 'admin');

        // Filtro por nome (campo em users)
        if ($request->filled('nome')) {
            $termo = '%' . $request->nome . '%';
            $query->where(function ($q) use ($termo) {
                $q->where('nome', 'like', $termo)
                    ->orWhere('sobrenome', 'like', $termo)
                    ->orWhere(DB::raw("CONCAT(nome, ' ', sobrenome)"), 'like', $termo);
            });
        }

        // Filtro por email (campo em perfil)
        if ($request->filled('email')) {
            $query->whereHas('perfil', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }

        // Filtro por CPF (campo em users)
        if ($request->filled('cpf')) {
            $query->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        $users = $query->paginate(8);

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
                'tipoPerfil' => $request->tipo_perfil,
                'user_id' => $user->id
            ]);

            if ($perfil) {
                if ($perfil->tipoPerfil == 'coordenador') {
                    CoordenadorGrupo::Create([
                        'user_id' => $user->id,
                        'ativo' => true
                    ]);
                }

                $user->assignRole('coordenador');

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
            $user->assignRole('coordenador');
        } else {
            if ($coordenador) {
                $coordenador->ativo = false;
                $coordenador->save();
            }
            $user->removeRole('coordenador');
            $grupos = GrupoMusical::where('coordenador_id', $coordenador->id)->get();
            $secretaria = User::where('cpf', 'admin')->first();


            if ($grupos->isNotEmpty() && $secretaria) {

                $secretariaCoord = CoordenadorGrupo::where('user_id', $secretaria->id)->first();
                if($secretariaCoord){
                    GrupoMusical::where('coordenador_id', $coordenador->id)
                        ->update(['coordenador_id' => $secretariaCoord->id]);
                }

            }
        }
        return redirect()->route('index.users')->with('status', 'Usuário atualizado com sucesso');
    }

    public function destroy(User $user)
    {
        $coordenador = CoordenadorGrupo::where('user_id', $user->id)->first();

        if($coordenador){
            $grupos = GrupoMusical::where('coordenador_id', $coordenador->id)->get();
            $secretaria = User::where('cpf', 'admin')->first();
            if ($grupos->isNotEmpty() && $secretaria) {
                $secretariaCoord = CoordenadorGrupo::where('user_id', $secretaria->id)->first();
                if ($secretariaCoord) {
                    GrupoMusical::where('coordenador_id', $coordenador->id)
                        ->update(['coordenador_id' => $secretariaCoord->id]);
                }
            }
        }
        $user->delete();

        return redirect()->route('index.users')->with('status', 'Usuário deletado com sucesso');
    }
}
