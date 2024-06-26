<?php

namespace Database\Seeders;

use App\Models\TiposEvaluadore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEvaluadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Docentes',
                'descripcion' => 'Como Evaluador',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 0
            ],
            [
                'nombre' => 'Coordinadores',
                'descripcion' => 'Como Evaluador',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 0
            ],
            [
                'nombre' => 'Estudiante',
                'descripcion' => 'Como Evaluador',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
        ];

        DB::connection('sqlsrv')
            ->table('tipos_evaluadores')
            ->insert($tipos);
    }
}
