<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertando los primeros 4 roles
        Role::create(['name' => 'director']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'alumno']);
    }
}

