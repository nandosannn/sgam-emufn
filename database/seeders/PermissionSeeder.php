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
        // Permissões
        Permission::create(['name' => 'visualizar usuários']);
        Permission::create(['name' => 'editar usuários']);
        Permission::create(['name' => 'gerenciar coordenadores']);
        Permission::create(['name' => 'ver relatórios']);

        // Papéis
        $admin = Role::create(['name' => 'admin']);
        $coordenador = Role::create(['name' => 'coordenador']);

        // Atribuir permissões aos papéis
        $admin->givePermissionTo(Permission::all());
        $coordenador->givePermissionTo(['ver relatórios']);
    }
}
