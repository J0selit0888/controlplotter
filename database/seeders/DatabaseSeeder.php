<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios de ejemplo
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => bcrypt('password'),
        ]);

        // Agregar más usuarios si es necesario

        // Mostrar un mensaje de éxito
        $this->command->info('Usuarios creados exitosamente');
    }
}
