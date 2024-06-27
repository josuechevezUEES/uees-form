<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect()->route('login');
});

//Route Hooks - Do not delete//
	Route::view('ins_instrumentos_vinculacion_opciones_preguntas', 'livewire.ins_instrumentos_vinculacion_opciones_preguntas.index')->middleware('auth');
	Route::view('eva_evaluaciones_respuestas', 'livewire.eva_evaluaciones_respuestas.index')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
