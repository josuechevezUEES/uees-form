<?php

use Illuminate\Console\View\Components\Task;
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
            ->create('eva_evaluaciones', function (Blueprint $table) {
                $table->id();

                $table->foreignId('tipo_evaluacion_id')
                    ->references('id')
                    ->on('tipos_evaluaciones');

                $table->foreignId('instrumento_id')
                    ->references('id')
                    ->on('ins_instrumentos_evaluaciones');

                $table->dateTime('fecha_inicio_evaluacion', 3);

                $table->dateTime('fecha_fin_evaluacion', 3);

                $table->boolean('estado');

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')->dropIfExists('eva_evaluaciones');
    }
};
