<?php

namespace Database\Seeders;

use App\Models\ModelHasRole;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = [
            'name' => 'josuec',
            'email' => 'josue.chevez@uees.edu.sv',
            'departamento' => '360-GTI',
            'departamento_nombre' => 'GERENECIA DE TENOLOGIA DE LA INFORMACION',
            'dui' => '057328807',
            'usuario_class' => 'josuec',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s.v'), // Formato con milisegundos
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s.v'), // Formato con milisegundos
        ];

        // Usar el método create para crear el usuario y obtener una instancia del modelo
        $nuevo_usuario = User::create($usuario);

        ModelHasRole::create([
            'role_id'    => 1, // desarrollador
            'model_type' => 'App\Models\User',
            'model_id'   => $nuevo_usuario->id
        ]);
    }
}
