<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Lista de permissões
        $permissions = [
            'visualizar usuários',
            'editar usuários',
            'excluir usuários',
            'criar eventos',
            'editar eventos',
            'excluir eventos',
            'ver relatórios', // ← adicionado para o coordenador
        ];

        // Cria as permissões (sem duplicar)
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }

        // Cria os papéis (sem duplicar)
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $coordenador = Role::firstOrCreate(['name' => 'coordenador']);

        // Atribui permissões aos papéis
        $admin->givePermissionTo(Permission::all());
        $coordenador->givePermissionTo(['ver relatórios']);
    }
}
