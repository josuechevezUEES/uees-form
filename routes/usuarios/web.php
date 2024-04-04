<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('configuraciones')
    ->group(function () {
        Route::view('roles', 'livewire.roles.index')->name('roles.index');
        Route::view('users', 'livewire.users.index')->name('users.index');

    });
