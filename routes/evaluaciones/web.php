<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('evaluaciones')
    ->group(function () {
        Route::view('tipos', 'livewire.tipos-evaluaciones.index')
            ->name('evaluaciones.tipos');

        Route::view('tipos/{tipo_evaluacion_id}/configuraciones', 'livewire.tipo-evaluacion.configuraciones.index')
            ->name('evaluaciones.tipos.configuraciones');
    });

Route::middleware(['auth'])
    ->prefix('configuraciones')
    ->group(function () {
        Route::view('evaluaciones/tipos-evaluadores', 'livewire.tipos-evaluadores.index')
            ->name('configuraciones.evaluaciones.tipos_evaluadores');
    });
