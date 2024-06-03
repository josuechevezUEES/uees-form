<?php

namespace App\Http\Controllers;

use App\Models\EvaEvaluacione;
use App\Models\EvaEvaluacionesRespuesta;
use App\Models\InsInstrumentosEvaluacione;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use App\Models\InstrumentoCuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class EstudianteEvalucionSeccionController extends Controller
{
    public $evaluacion_id, $seccion_id;
    public $usuario, $instrumento;
    public $evaluacion;
    public $seccion = [], $preguntas = [];

    public function obtener_informacion_evaluacion(Request $request)
    {
        $this->evaluacion_id = $request->evaluacion_id;

        $this->evaluacion  = EvaEvaluacione::find($request->evaluacion_id);
        $this->seccion     = InsInstrumentosSeccione::find($this->seccion_id);
        $this->instrumento = InstrumentoCuestionario::find($this->seccion->id);
        $this->preguntas   = InsInstrumentosPregunta::where('cuestionario_id', $this->instrumento->id)->get();
    }

    public function index(Request $request)
    {
        $this->evaluacion_id = $request->evaluacion_id;
        $this->seccion_id = $request->seccion_id;

        $this->obtener_informacion_evaluacion($request);

        return view('estudiantes.evaluacion.secciones.index', [
            'estudiante'     => $this->usuario,
            'evaluacion'     => $this->evaluacion,
            'seccion'        => $this->seccion,
            'preguntas'      => $this->preguntas,
            'instrumento_id' => $this->instrumento->id
        ]);
    }

    public function almacenar_respuestas(Request $request)
    {
        // array original recibido del request
        $respuestas_request = $request->all();

        // return $respuestas_request;

        // Crear un nuevo array para almacenar las preguntas transformadas
        $preguntas_transformadas = [];

        // Iterar sobre el array original
        foreach ($respuestas_request as $key => $value) {
            // Comprobar si la clave empieza con "pregunta-"
            if (strpos($key, 'pregunta-') === 0 &&  is_numeric($value) == true && $key != '_token') {

                // Extraer el id de la pregunta
                $pregunta_id = str_replace('pregunta-', '', $key);

                // Añadir el nuevo formato al array de preguntas transformadas
                $preguntas_transformadas[] = [
                    'id'                 => EvaEvaluacionesRespuesta::count() + 1,
                    'usuario_encuestado' => Auth::id(),
                    'evaluacion_id'      => $request->evaluacion_id,
                    'pregunta_id'        => $pregunta_id,
                    'seccion_id'         => $request->seccion_id,
                    'opcion_id'          => $value, // Si es numérico, asignarlo a opcion_id
                    'comentario'         => is_numeric($value) ? '' : $value, // Si no es numérico, asignarlo a comentario
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ];
            }

            // Si no es numérico, asignarlo a comentario
            if (strpos($key, 'opcion-') === 0  && $key != '_token') :

                // Extraer el id de la opcion
                $opcion_id = str_replace('opcion-', '', $key);

                // Añadir el nuevo formato al array de preguntas transformadas
                $preguntas_transformadas[] = [
                    'id'                 => EvaEvaluacionesRespuesta::count() + 1,
                    'usuario_encuestado' => Auth::id(),
                    'evaluacion_id'      => $request->evaluacion_id,
                    'pregunta_id'        => $pregunta_id,
                    'seccion_id'         => $request->seccion_id,
                    'opcion_id'          => $opcion_id,
                    'comentario'         => $request->get($key),
                    'created_at'         => now(),
                    'updated_at'         => now(),
                    'request' => $respuestas_request
                ];
            endif;
        }

        return $preguntas_transformadas;

        try {
            // Insertar los datos en la base de datos
            EvaEvaluacionesRespuesta::insert($preguntas_transformadas);

            return response()->json([
                'success' => true,
                EvaEvaluacionesRespuesta::all()
            ]);
        } catch (QueryException $e) {
            // Manejo de excepciones
            return response()->json([
                'success' => false,
                'message' => "Error al insertar los registros: " . $e->getMessage(),
            ]);
        }
    }
}
