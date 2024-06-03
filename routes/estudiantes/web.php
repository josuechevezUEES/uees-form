<?php

use App\Http\Controllers\EstudianteEvalucionController;
use App\Http\Controllers\EstudianteEvalucionSeccionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('estudiantes')
    ->group(function () {

        // Route::view('/evaluaciones', 'livewire.estudiantes.evaluaciones.index')
        //     ->name('estudiantes.evaluaciones.index');

        // Route::view('/evaluaciones/{evaluacion_id}/secciones', 'livewire.estudiantes.evaluaciones.evaluacion.index')
        //     ->name('estudiantes.evaluaciones.ver');

        // Route::view('/evaluaciones/secciones/{seccion_id}/evaluacion', 'livewire.estudiantes.evaluaciones.secciones.index')
        //     ->name('estudiantes.evaluaciones.cuestionarios');

        Route::get('evaluaciones/{evaluacion_id}/secciones', [EstudianteEvalucionController::class, 'index'])
            ->name('estudiantes.evaluaciones.secciones');

        Route::get('evaluaciones/{evaluacion_id}/secciones/{seccion_id}/cuestionario', [EstudianteEvalucionSeccionController::class, 'index'])
            ->name('estudiantes.evaluaciones.seccion');

        Route::post('evaluaciones/{evaluacion_id}/secciones/{seccion_id}/cuestionario/almacenar-respuestas', [EstudianteEvalucionSeccionController::class, 'almacenar_respuestas'])
            ->name('estudiantes.evaluaciones.seccion.almacenar_respuestas');
    });
