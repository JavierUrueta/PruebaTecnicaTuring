<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si ya existe el rol 'admin', si no, lo crea
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Crea el usuario administrador
        $user = User::create([
            'name' => 'Director',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Asegúrate de que la contraseña esté correctamente encriptada
        ]);

        // Asigna el rol 'admin' al usuario creado
        $user->assignRole($role);
    }
}

