<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('instrumentos')
    ->group(function () {
        Route::view('/', 'livewire.ins-instrumentos-evaluaciones.index')
            ->name('instrumentos_evaluaciones.index');

        Route::view('/{instrumento_id}/secciones', 'livewire.ins-instrumentos-secciones.index')
            ->name('instrumentos_evaluaciones.secciones');
    });
