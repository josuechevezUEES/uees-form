<?php

namespace Database\Seeders;

use App\Models\TiposEvaluadore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEvaluadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Docente',
                'descripcion' => 'Como Evaluador',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Coordinadores',
                'descripcion' => 'Como Evaluador',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => '	Servicios UEES',
                'descripcion' => 'Como Evaluador',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
        ];

        TiposEvaluadore::insert($tipos);
    }
}
