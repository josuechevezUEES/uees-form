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
            ->create('ins_instrumentos_vinculacion_opciones_preguntas', function (Blueprint $table) {
                $table->id();
                $table->foreignId('opcion_id')
                    ->constrained('ins_instrumentos_opciones')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->index('fk_opc_preg_opc_id_foreign');

                $table->foreignId('pregunta_id')
                    ->constrained('ins_instrumentos_preguntas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade')
                    ->index('fk_opc_preg_pre_id_foreign');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::connection('mysql')
            ->dropIfExists('ins_instrumentos_vinculacion_opciones_preguntas');
    }
};
