<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserPerfil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:11', 'unique:users'],
            'password' => $this->passwordRules(),

            // Validações para perfil
            'ocupacao' => ['nullable', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:user_perfils'],
        ])->validate();

        // Cria o usuário
        $user = User::create([
            'nome' => $input['nome'],
            'sobrenome' => $input['sobrenome'],
            'cpf' => $input['cpf'],
            'password' => Hash::make($input['password']),
        ]);

        UserPerfil::create([
            'ocupacao' => $input['ocupacao'] ?? null,
            'telefone' => $input['telefone'],
            'email' => $input['email'],
            'tipoPerfil' => 'solicitante',
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
