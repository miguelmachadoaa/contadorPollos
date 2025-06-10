<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'password'=>Hash::make('12121212'),
             'rol'=>1
        ]);

        $this->call(RolSeeder::class);
        $this->call(ConfigurationSeeder::class);
    }
}
