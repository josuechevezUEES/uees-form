<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('roles')
    ->group(function () {
        Route::view('/', 'livewire.roles.index')->name('roles.index');
    });
