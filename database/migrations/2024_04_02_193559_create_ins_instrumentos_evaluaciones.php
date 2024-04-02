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
        Schema::connection('mysql')->create('ins_instrumentos_evaluaciones', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');

            $table->longText('descripcion')
                ->nullable()
                ->default(null);

            $table->boolean('estado');

            $table->timestamps(3);
        });


        Schema::connection('sqlsrv')->create('ins_instrumentos_evaluaciones', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');

            $table->longText('descripcion')
                ->nullable()
                ->default(null);

            $table->boolean('estado');

            $table->timestamps(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('ins_instrumentos_evaluaciones');
        Schema::connection('sqlsrv')->dropIfExists('ins_instrumentos_evaluaciones');
    }
};
