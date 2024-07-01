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
            ->create('tip_tipos_preguntas', function (Blueprint $table) {
                $table->id();

                $table->string('nombre');

                $table->string('entrada')
                    ->comment('Input HTML');

                $table->boolean('comentario');

                $table->boolean('estado');

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')
            ->dropIfExists('tip_tipos_preguntas');
    }
};