<?php

namespace App\Http\Controllers;

use App\Models\EvaEvaluacione;
use App\Models\InsInstrumentosSeccione;
use Illuminate\Http\Request;

class EstudianteEvalucionController extends Controller
{

    public $usuario;
    public $evaluacion_id;
    public EvaEvaluacione $evaluacion;

    public $secciones = [];

    public function obtener_informacion_evaluacion(Request $request)
    {
        $this->evaluacion_id = $request->evaluacion_id;

        $this->evaluacion = EvaEvaluacione::find($request->evaluacion_id);

        $this->secciones = InsInstrumentosSeccione::where('instrumento_id', $this->evaluacion->instrumento_id)
            ->get();
    }

    public function index(Request $request)
    {

        $this->usuario = $request->user();

        $this->obtener_informacion_evaluacion($request);

        return view('estudiantes.evaluacion.index', [
            'estudiante' => $this->usuario,
            'evaluacion' => $this->evaluacion,
            'secciones'  => $this->secciones,
            'evaluacion_id' => $this->evaluacion_id,
        ]);
    }
}
