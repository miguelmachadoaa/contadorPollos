<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuracion;
class ConfigurationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Configuracion::create([
            'negocio'=>'La Caridad',
            'direccion'=>'Maracay',
            'telefono'=>'123123',
            'email'=>'admin@gmail.com',
            'whatsapp'=>'#',
            'videofooter'=>'#',
            'show_idioma'=>'0',
            'user_id'=>1
        ]);
        
    }
}
