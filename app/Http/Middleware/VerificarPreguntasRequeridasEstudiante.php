<?php

namespace App\Http\Middleware;

use App\Models\EvaEvaluacionesRespuesta;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use App\Models\InstrumentoCuestionario;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarPreguntasRequeridasEstudiante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el evaluacion_id y seccion_id desde la ruta
        $evaluacionId = $request->route('evaluacion_id');
        $seccionId = $request->route('seccion_id');


        // Aquí puedes llamar a tu función `contarPreguntasRequeridasSinRespuesta`
        $preguntasPendientes = $this->contarPreguntasRequeridasSinRespuesta($evaluacionId, $seccionId);


        // Si hay preguntas requeridas sin respuesta, puedes tomar alguna acción
        if ($preguntasPendientes > 0) {
            return $next($request);

        }

        return redirect()->back();

    }
    /*
    * Contar las preguntas requeridas que no tienen respuesta por el usuario en sesión.
    *
    * @param int $evaluacionId
    * @param int $seccionId
    * @return int
    */
    private function contarPreguntasRequeridasSinRespuesta($evaluacionId, $seccionId)
    {
        // Obtener el nombre del usuario en sesión
        $usuario = Auth::user();

        // obtener  seccion
        $seccion = InsInstrumentosSeccione::find($evaluacionId);

        // ontener intrumento o cuestionario
        $instrumento = InstrumentoCuestionario::where('seccion_id', $seccionId)
            ->first();

        if (!$instrumento) {
            return 0; // O cualquier acción que necesites en caso de que el instrumento no exista
        }

        // Obtener las preguntas requeridas del cuestionario
        $preguntasRequeridas = InsInstrumentosPregunta::where('cuestionario_id', $instrumento->id)
            ->where('requerido', true)
            ->get();

        // Obtener las respuestas de las preguntas requeridas por el usuario en sesión
        $respuestasPreguntasRequeridas = EvaEvaluacionesRespuesta::whereIn('pregunta_id', $preguntasRequeridas->pluck('id'))
            ->where('usuario_encuestado', $usuario->name)
            ->get();

        // Calcular la diferencia entre las preguntas requeridas y las preguntas con respuesta
        $preguntasPendientes = $preguntasRequeridas->count() - $respuestasPreguntasRequeridas->count();

        return $preguntasPendientes;
    }
}
