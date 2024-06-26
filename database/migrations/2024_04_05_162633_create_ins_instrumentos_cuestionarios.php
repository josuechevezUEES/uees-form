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
            ->create('ins_instrumentos_cuestionarios', function (Blueprint $table) {
                $table->id();

                $table->foreignId('seccion_id')
                    ->references('id')
                    ->on('ins_instrumentos_secciones')
                    ->comment('Relacion con ins_instrumentos_evaluaciones');

                $table->timestamps(3);
            });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('ins_instrumentos_cuestionarios');
    }
};
