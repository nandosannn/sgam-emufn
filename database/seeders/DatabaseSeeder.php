<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // 1. Primeiro criar as permissões e roles
        $this->call([
            PermissionSeeder::class, // ← ADICIONE ESTA LINHA
        ]);

        // 3. Criar usuário admin e atribuir role
        $adminUser = User::create([
            'nome' => 'Adm',
            'sobrenome' => 'Sgam',
            'cpf' => '12345678912',
            'password' => Hash::make('sgam!2025'),
            'ativo' => true,
        ]);

        // Atribuir role de admin ao usuário
        $adminUser->assignRole('admin');
    }
}
