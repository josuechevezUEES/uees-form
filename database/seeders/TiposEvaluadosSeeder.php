<?php

namespace Database\Seeders;

use App\Models\TiposEvaluado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEvaluadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Docentes',
                'descripcion' => 'Como Evaluado',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 0
            ],
            [
                'nombre' => 'Coordinadores',
                'descripcion' => 'Como Evaluado',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 0
            ],
            [
                'nombre' => '	Servicios UEES',
                'descripcion' => 'Como Evaluado',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
        ];

        DB::connection('sqlsrv')
            ->table('tipos_evaluados')
            ->insert($tipos);
    }
}
