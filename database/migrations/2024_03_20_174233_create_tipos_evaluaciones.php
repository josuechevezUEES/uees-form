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
            ->create('tipos_evaluaciones', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('descripcion');
                $table->boolean('estado');
                $table->timestamps(3);
            });

        Schema::connection('mysql')
            ->create('tipos_evaluaciones', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('descripcion');
                $table->boolean('estado');
                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')->dropIfExists('tipos_evaluaciones');
        Schema::connection('mysql')->dropIfExists('tipos_evaluaciones');
    }
};