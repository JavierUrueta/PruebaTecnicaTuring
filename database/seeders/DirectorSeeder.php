<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertando un director con el rol 1 (siempre será 1)
        Director::create([
            'name' => 'Julia Esquivel',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345'), // Encriptar la contraseña
            'role' => 1
        ]);
    }
}
