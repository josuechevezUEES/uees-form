<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Evaluación de Satisfacción',
                'descripcion' => 'Evaluación de servicios de UEES para el estudiantes',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
        ];

        DB::connection('sqlsrv')
            ->table('tipos_evaluaciones')
            ->insert($tipos);
    }
}
