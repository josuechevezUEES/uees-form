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
            ->create('tpe_configuraciones_modalidades', function (Blueprint $table) {
                $table->id();

                $table->foreignId('tpe_configuracion_id')
                    ->references('id')
                    ->on('tpe_configuracion');

                $table->string('modalidad');

                $table->timestamps(3);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('sqlsrv')->dropIfExists('tpe_configuraciones_modalidades');
    }
};
