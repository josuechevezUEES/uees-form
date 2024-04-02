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
                'nombre' => 'Evaluacion Docente Estudiante Posgrado',
                'descripcion' => 'Evaluacion del estudianta a sus docentes',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Evaluacion Coordinador Docente Posgrado',
                'descripcion' => 'Evaluacion del cooordinador a sus docentes',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Evaluacion de Satisfaccion',
                'descripcion' => 'Evaluacion de servicios de UEES para el estudiatne',
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
