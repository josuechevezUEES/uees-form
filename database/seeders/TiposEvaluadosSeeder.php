<?php

namespace Database\Seeders;

use App\Models\TiposEvaluado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEvaluadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Docente',
                'descripcion' => 'Como Evaluado',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Coordinadores',
                'descripcion' => 'Como Evaluado',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => '	Servicios UEES',
                'descripcion' => 'Como Evaluado',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
        ];

        TiposEvaluado::insert($tipos);
    }
}
