<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => $this->faker->firstName(),
            'sobrenome' => $this->faker->lastName(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'password' => bcrypt('password'), // ou Hash::make('password')
            'ativo' => true,
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                // Se não tem email_verified_at, pode remover este método
                // ou adaptar para outro campo se necessário
            ];
        });
    }
}
