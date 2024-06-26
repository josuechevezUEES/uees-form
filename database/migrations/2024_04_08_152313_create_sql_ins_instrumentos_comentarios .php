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
            ->create('ins_instrumentos_comentarios', function (Blueprint $table) {
                $table->id();

                $table->foreignId('pregunta_id')
                    ->references('id')
                    ->on('ins_instrumentos_preguntas')
                    ->onDelete('CASCADE');

                $table->string('comentario')
                    ->nullable(true)
                    ->default(null);

                $table->string('entrada')
                    ->nullable(true)
                    ->default('text');

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')->dropIfExists('ins_instrumentos_comentarios');
    }
};
