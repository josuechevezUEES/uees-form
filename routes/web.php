<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


//Route Hooks - Do not delete//
	// Route::view('eva_evaluaciones_respuestas', 'livewire.eva_evaluaciones_respuestas.index')->middleware('auth');
	// Route::view('ins_instrumentos_comentarios', 'livewire.ins_instrumentos_comentarios.index')->middleware('auth');
	// Route::view('ins_instrumentos_opciones', 'livewire.ins_instrumentos_opciones.index')->middleware('auth');
	// Route::view('model_has_roles', 'livewire.model_has_roles.index')->middleware('auth');

// Route::view('tpe_configuraciones_facultades', 'livewire.tpe_configuraciones_facultades.index')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
