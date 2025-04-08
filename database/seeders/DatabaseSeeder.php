<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'nick' => 'admin',
            'password' => Hash::make('admin'),
            'nombre' => 'Paco',
            'apellidos' => 'Siuu',
            'departamento' => 'informatica',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'nick' => 'test',
            'password' => Hash::make('test'),
            'nombre' => 'Manolin',
            'apellidos' => 'test',
            'departamento' => 'produccion',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('incidencias')->insert([
            'descripcion' => 'testdescripcion',
            'tipo' => 'Hardware',
            'estado' => 'Pendiente',
            'nick' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}