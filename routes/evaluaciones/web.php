<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('evaluaciones')
    ->group(function () {

        Route::view('/', 'livewire.eva-evaluaciones.index')
            ->name('evaluaciones.index');
    });

Route::middleware(['auth'])
    ->prefix('configuraciones')
    ->group(function () {
        Route::view('/tipos-evaluadores', 'livewire.tipos-evaluadores.index')
            ->name('configuraciones.evaluaciones.tipos_evaluadores');

        Route::view('/tipos-evaluados', 'livewire.tipos-evaluados.index')
            ->name('configuraciones.evaluaciones.tipos_evaluados');

        Route::view('/tipos-preguntas', 'livewire.tip-tipos-preguntas.index')
            ->name('configuraciones.tipos-preguntas');

        Route::view('/tipos-evaluaciones', 'livewire.tipos-evaluaciones.index')
            ->name('evaluaciones.tipos');

        Route::view('/{tipo_evaluacion_id}/configuraciones', 'livewire.tipo-evaluacion.configuraciones.index')
            ->name('evaluaciones.tipos.configuraciones');
    });
