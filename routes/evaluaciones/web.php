<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('evaluaciones')
    ->group(function () {
        Route::view('tipos', 'livewire.tipos-evaluaciones.index')
            ->name('evaluaciones.tipos');
    });
