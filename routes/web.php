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
    return view('welcome');
});


//Route Hooks - Do not delete//
	Route::view('ins_instrumentos_evaluaciones', 'livewire.ins_instrumentos_evaluaciones.index')->middleware('auth');
// Route::view('tpe_configuraciones_facultades', 'livewire.tpe_configuraciones_facultades.index')->middleware('auth');
Route::view('users', 'livewire.users.index')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
