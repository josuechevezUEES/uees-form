<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'desarrollador',
                'guard_name' => 'web',
            ],
            [
                'name' => 'estudiante',
                'guard_name' => 'web',
            ],
            [
                'name' => 'administrador',
                'guard_name' => 'web',
            ],
            [
                'name' => 'asistente',
                'guard_name' => 'web',
            ]
        ];

        DB::connection('sqlsrv')
            ->table('roles')
            ->insert($roles);
    }
}
