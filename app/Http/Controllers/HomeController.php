<?php

namespace App\Http\Controllers;

use App\Models\EvaEvaluacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home', [
            'evaluaciones' => $this->buscar_evaluaciones_activas_estudiante(),
        ]);
    }

    /**
     * Buscar evaluaciones por faculta del usuario en sesion
     * primero consulta el EvaEvaluacione hace un join con
     * TpeConfiguracion para luego hacer un join con
     * TpeConfiguracionesFacultades y luego un where a la columna codigo_facultad
     *
     * @return mix evaluaciones
     */
    protected function buscar_evaluaciones_activas_estudiante()
    {

        $facultad = Auth::user()->facultad_id;
        $modalidad = Auth::user()->modalidad;

        $evaluaciones = EvaEvaluacione::where('estado', 1)
            ->whereHas('tiposEvaluacione.tpeConfiguracion.configuracionFacultades', function ($query) use ($facultad) {
                $query->where('codigo_facultad', $facultad);
            })
            ->whereHas('tiposEvaluacione.tpeConfiguracion.configuracionModalidades', function ($query) use ($modalidad) {
                $query->where('modalidad', $modalidad);
            })
            ->get();

        return $evaluaciones;
    }
}
