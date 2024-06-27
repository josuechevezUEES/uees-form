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
            ->create('ins_instrumentos_vinculacion_opciones_preguntas', function (Blueprint $table) {
                $table->id();
                $table->foreignId('opcion_id')
                    ->references('id')
                    ->on('ins_instrumentos_opciones');

                $table->foreignId('pregunta_id')
                    ->references('id')
                    ->on('ins_instrumentos_preguntas');
                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')
            ->dropIfExists('ins_instrumentos_vinculacion_opciones_preguntas');
    }
};
