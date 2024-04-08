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
            ->create('ins_instrumentos_preguntas', function (Blueprint $table) {
                $table->id();

                $table->foreignId('cuestionario_id')
                    ->references('id')
                    ->on('ins_instrumentos_cuestionarios')
                    ->onDelete('CASCADE');

                $table->foreignId('tipo_pregunta_id')
                    ->references('id')
                    ->on('tip_tipos_preguntas');

                $table->string('nombre');

                $table->string('sub_numeral');

                $table->boolean('requerido');

                $table->timestamps();
            });

        Schema::connection('sqlsrv')
            ->create('ins_instrumentos_preguntas', function (Blueprint $table) {
                $table->id();

                $table->foreignId('cuestionario_id')
                    ->references('id')
                    ->on('ins_instrumentos_cuestionarios')
                    ->onDelete('CASCADE');

                $table->foreignId('tipo_pregunta_id')
                    ->references('id')
                    ->on('tip_tipos_preguntas');

                $table->string('nombre');

                $table->string('sub_numeral');

                $table->boolean('requerido');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('ins_instrumentos_preguntas');
        Schema::connection('sqlsrv')->dropIfExists('ins_instrumentos_preguntas');
    }
};
