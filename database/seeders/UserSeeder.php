<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear administradores
        User::create([
            'name' => 'Christian',
            'email' => 'christian@gmail.com',
            'password' => Hash::make('christian1234'),
            'role_id' => 1, // Suponiendo que 1 es el ID de administrador
        ]);

        User::create([
            'name' => 'Juan Pablo',
            'email' => 'juanpablo@gmail.com',
            'password' => Hash::make('juanpablo1234'),
            'role_id' => 1, // Suponiendo que 1 es el ID de administrador
        ]);

        // Crear maestros
        User::create([
            'name' => 'Maestro CCR',
            'email' => 'maestroccr@gmail.com',
            'password' => Hash::make('maestroccr1234'),
            'role_id' => 2, // Suponiendo que 2 es el ID de maestro
        ]);

        User::create([
            'name' => 'Batz',
            'email' => 'batz@gmail.com',
            'password' => Hash::make('bat1234'),
            'role_id' => 2, // Suponiendo que 2 es el ID de maestro
        ]);

        // Crear estudiante
        User::create([
            'name' => 'Estudiante CCR',
            'email' => 'estudianteccr@gmail.com',
            'password' => Hash::make('estudiante1234'),
            'role_id' => 3, // Suponiendo que 3 es el ID de estudiante
        ]);
    }
}
