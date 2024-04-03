<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')
            ->table('users', function (Blueprint $table) {
                $table->string('facultad_id')
                    ->nullable()
                    ->default(null);

                $table->string('facultad_nombre')
                    ->nullable()
                    ->default(null);

                $table->string('carrera_id')
                    ->nullable()
                    ->default(null);

                $table->string('carrera_nombre')
                    ->nullable()
                    ->default(null);


                $table->string('departamento')
                    ->nullable()
                    ->default(null);


                $table->string('departamento_nombre')
                    ->nullable()
                    ->default(null);

                $table->string('dui')
                    ->nullable()
                    ->default(null);

                $table->string('cif')
                    ->nullable()
                    ->default(null);

                $table->string('usuario_class')
                    ->nullable()
                    ->default(null);

                $table->boolean('estado')
                    ->nullable()
                    ->default(null);

                $table->string('modalidad')
                    ->nullable()
                    ->default(null);
            });


        Schema::connection('sqlsrv')
            ->table('users', function (Blueprint $table) {
                $table->string('facultad_id')
                    ->nullable()
                    ->default(null);

                $table->string('facultad_nombre')
                    ->nullable()
                    ->default(null);

                $table->string('carrera_id')
                    ->nullable()
                    ->default(null);

                $table->string('carrera_nombre')
                    ->nullable()
                    ->default(null);


                $table->string('departamento')
                    ->nullable()
                    ->default(null);


                $table->string('departamento_nombre')
                    ->nullable()
                    ->default(null);

                $table->string('dui')
                    ->nullable()
                    ->default(null);

                $table->string('cif')
                    ->nullable()
                    ->default(null);

                $table->string('usuario_class')
                    ->nullable()
                    ->default(null);

                $table->boolean('estado')
                    ->nullable()
                    ->default(null);

                $table->string('modalidad')
                    ->nullable()
                    ->default(null);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')
            ->dropColumns('users', ['facultad_id', 'facultad_nombre', 'carrera_id', 'carrera_nombre', 'dui', 'cif', 'usuario_class', 'estado', 'modalidad']);

        Schema::connection('sqlsrv')
            ->dropColumns('users', ['facultad_id', 'facultad_nombre', 'carrera_id', 'carrera_nombre', 'dui', 'cif', 'usuario_class', 'estado', 'modalidad']);
    }
};
