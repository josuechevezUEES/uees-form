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
            ->create('tipos_evaluados', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('descripcion');
                $table->boolean('estado');
                $table->timestamps(3);
            });

        Schema::connection('sqlsrv')
            ->create('tipos_evaluados', function (Blueprint $table) {
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
        Schema::connection('mysql')
            ->dropIfExists('tipos_evaluados');

        Schema::connection('sqlsrv')
            ->dropIfExists('tipos_evaluados');
    }
};
