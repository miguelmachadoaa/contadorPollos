<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Roles::create([
            'nombre' => 'Administrador',
            'permisos' =>null
        ]);
        Roles::create([
            'nombre' => 'Supervisor',
            'permisos' =>null
        ]);
        Roles::create([
            'nombre' => 'Agente',
            'permisos' =>null
        ]);
        Roles::create([
            'nombre' => 'Cliente',
            'permisos' =>null
        ]);
        
    }
}
