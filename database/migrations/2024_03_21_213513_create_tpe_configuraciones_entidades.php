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
        Schema::connection('mysql')->create('tpe_configuraciones_entidades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tpe_configuracion_id')
                ->references('id')
                ->on('tpe_configuracion');

            $table->foreignId('evaluador_id')
                ->references('id')
                ->on('tipos_evaluadores');

            $table->foreignId('evaluados_id')
                ->references('id')
                ->on('tipos_evaluados');

            $table->timestamps(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tpe_configuraciones_entidades');
    }
};
