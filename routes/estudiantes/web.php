<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('estudiantes')
    ->group(function () {

        Route::view('/evaluaciones', 'livewire.estudiantes.evaluaciones.index')
            ->name('estudiantes.evaluaciones.index');

        Route::view('/evaluaciones/{evaluacion_id}/secciones', 'livewire.estudiantes.evaluaciones.evaluacion.index')
            ->name('estudiantes.evaluaciones.ver');

        Route::view('/evaluaciones/secciones/{seccion_id}/evaluacion', 'livewire.estudiantes.evaluaciones.secciones.index')
            ->name('estudiantes.evaluaciones.cuestionarios');
    });
