<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('estudiantes')
    ->group(function () {

        Route::view('/evaluaciones', 'livewire.estudiantes.evaluaciones.index')
            ->name('estudiantes.evaluaciones.index');

        Route::view('/evaluaciones/{evaluacion_id}/secciones', 'livewire.estudiantes.evaluaciones.secciones.index')
            ->name('estudiantes.evaluaciones.secciones');
    });
