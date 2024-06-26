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
            ->create('tpe_configuracion', function (Blueprint $table) {
                $table->id();

                $table->foreignId('tipo_evaluacion_id')
                    ->references('id')
                    ->on('tipos_evaluaciones');

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')
            ->dropIfExists('tpe_configuracion');
    }
};
