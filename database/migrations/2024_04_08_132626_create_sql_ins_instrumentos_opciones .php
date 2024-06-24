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
            ->create('ins_instrumentos_opciones', function (Blueprint $table) {
                $table->id();

                $table->foreignId('pregunta_id')
                    ->references('id')
                    ->on('ins_instrumentos_preguntas')
                    ->onDelete('CASCADE');

                $table->string('nombre');

                $table->string('entrada');

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')->dropIfExists('ins_instrumentos_opciones');
    }
};
