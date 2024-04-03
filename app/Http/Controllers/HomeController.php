<?php

namespace App\Http\Controllers;

use App\Models\EvaEvaluacione;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function obtener_evaluaciones($estudiante)
    {
        $buscar_evaluaciones_activa = EvaEvaluacione::whereHas('tiposEvaluacione.tpeConfiguracion.configuracionEntidades', function ($query) {
            $query->where('evaluador_id', 3);
        })
            ->whereHas('tiposEvaluacione.tpeConfiguracion.configuracionFacultades', function ($query) use ($estudiante) {
                $query->where('codigo_facultad', $estudiante->CARCOD);
            })
            ->whereHas('tiposEvaluacione.tpeConfiguracion.configuracionModalidades', function ($query) use ($estudiante) {
                $query->where('modalidad', $estudiante->MODALIDAD);
            })
            ->where('estado', 1)
            ->get();
    }
}
