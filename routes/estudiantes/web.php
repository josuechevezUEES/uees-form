<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('estudiantes')
    ->group(function () {

        Route::view('/evaluaciones', 'livewire.estudiantes.evaluaciones.index')
            ->name('estudiantes.evaluaciones.index');

        Route::view('/evaluaciones/{evaluacion_id}/ver', 'livewire.estudiantes.evaluaciones.evaluacion.index')
            ->name('estudiantes.evaluaciones.ver');
    });
