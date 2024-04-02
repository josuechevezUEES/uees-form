<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('instrumentos')
    ->group(function () {
        Route::view('/', 'livewire.ins-instrumentos-evaluaciones.index')
            ->name('instrumentos_evaluaciones.index');
    });
