<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPreguntaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Pregunta Cerrada',
                'entrada' => 'radio',
                'comentario' => '',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Pregunta Abierta',
                'entrada' => 'text',
                'comentario' => '',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Pregunta Selección Multiple',
                'entrada' => 'checkbox',
                'comentario' => '',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
            [
                'nombre' => 'Pregunta Cerrada Compleja',
                'entrada' => 'radio',
                'comentario' => '1',
                'created_at' => date('Y-m-d h:i'),
                'updated_at' => date('Y-m-d h:i'),
                'estado' => 1
            ],
        ];

        DB::connection('sqlsrv')
            ->table('tip_tipos_preguntas')
            ->insert($tipos);
    }
}
