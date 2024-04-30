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
        Schema::connection('sqlsrv')
            ->create('eva_evaluaciones_respuestas', function (Blueprint $table) {
                $table->id();

                $table->foreignId('usuario_id')
                    ->references('id')
                    ->on('users');

                $table->foreignId('evaluacion_id')
                    ->references('id')
                    ->on('eva_evaluaciones');

                $table->foreignId('seccion_id')
                    ->references('id')
                    ->on('ins_instrumentos_secciones');

                $table->foreignId('pregunta_id')
                    ->references('id')
                    ->on('ins_instrumentos_preguntas');

                $table->foreignId('opcion_id')
                    ->references('id')
                    ->on('ins_instrumentos_opciones');

                $table->longText('comentario')
                    ->nullable()
                    ->default(null);

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')
            ->dropIfExists('eva_evaluaciones_respuestas');
    }
};
