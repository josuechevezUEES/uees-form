<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('instrumentos')
    ->group(function () {
        Route::view('/', 'livewire.ins_instrumentos_evaluaciones.index')
            ->name('instrumentos_evaluaciones.index');
    });
