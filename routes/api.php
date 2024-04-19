<?php

use App\Http\Controllers\ChatOpenAiController;
use App\Models\ClienteClass;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

function busar_cif_estudiante(string $cif) : Collection
{
    return ClienteClass::where('CLICUN', $cif)->get();
}

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chat/{q?}', [ChatOpenAiController::class, 'index']);
Route::get('/chat/{cif}', [ChatOpenAiController::class, 'busar_cif_estudiante']);