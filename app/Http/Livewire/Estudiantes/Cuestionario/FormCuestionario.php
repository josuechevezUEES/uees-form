<?php

namespace App\Http\Livewire\Estudiantes\Cuestionario;

use App\Models\EvaEvaluacione;
use App\Models\EvaEvaluacionesRespuesta;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use App\Models\InstrumentoCuestionario;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FormCuestionario extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'obtenerRespuesta' => 'obtenerRespuesta',
        'focusPregunta' => 'focusPregunta'
    ];

    public string $evaluacion_id;
    public string $seccion_id;
    public $usuario, $instrumento;
    public $evaluacion, $contador_preguntas_pendiente = 0;
    public $seccion = [], $preguntas = [];

    public $focus_pregunta;

    public array $repuestas = [];

    public function obtener_registro_usuario_sesion()
    {
        $this->usuario = Auth::user();
    }

    public function obtener_informacion_evaluacion()
    {

        $this->evaluacion  = EvaEvaluacione::find($this->evaluacion_id);
        $this->seccion     = InsInstrumentosSeccione::find($this->seccion_id);
        $this->instrumento = InstrumentoCuestionario::find($this->seccion->id);
        $this->preguntas   = InsInstrumentosPregunta::where('cuestionario_id', $this->instrumento->id)
            ->get();
    }

    public function focusPregunta($pregunta_id)
    {
    }

    public function mount(): void
    {
        $this->obtener_informacion_evaluacion();
        $this->obtener_registro_usuario_sesion();
    }

    public function render()
    {
        return view('livewire.estudiantes.cuestionario.form-cuestionario');
    }

    public function obtenerRespuesta(array $respuesta)
    {
        // Buscar si la pregunta_id ya existe en el array de respuestas
        $found = false;

        foreach ($this->repuestas as &$existingRespuesta) :

            switch ($existingRespuesta['tipo_pregunta']):
                case '1':
                    if ($existingRespuesta['pregunta_id'] == $respuesta['pregunta_id']) :
                        // Si ya existe, actualiza el valor de opcion_id y required
                        $existingRespuesta['opcion_id']  = $respuesta['opcion_id'];
                        $existingRespuesta['required']   = $respuesta['required'];

                        $found = true;
                        break;
                    endif;
                    break;
                case '2':
                    if ($existingRespuesta['pregunta_id'] == $respuesta['pregunta_id']) :
                        // Si ya existe, actualiza el valor de opcion_id y required
                        $existingRespuesta['opcion_id']  = $respuesta['opcion_id'];
                        $existingRespuesta['required']   = $respuesta['required'];

                        if (isset($respuesta['comentario'])) :
                            $existingRespuesta['comentario'] = $respuesta['comentario'];
                        endif;

                        $found = true;
                        break;
                    endif;
                    break;
                case '3':
                    if ($existingRespuesta['pregunta_id'] == $respuesta['pregunta_id']) :

                        // Verifica si la clave 'opcion' está definida en ambas variables
                        if (isset($existingRespuesta['opcion']) && isset($respuesta['opcion'])) {

                            // Si ya existe, actualiza el valor de opcion_id y required
                            foreach ($existingRespuesta['opcion'] as $index => $opcion) :
                                if ($opcion['opcion_id'] == $respuesta['opcion'][0]['opcion_id']) :
                                    unset($existingRespuesta['opcion'][$index]);
                                else :
                                    array_push($existingRespuesta['opcion'], $respuesta['opcion'][0]);
                                endif;
                            endforeach;
                        } else {
                            // Inicializa la clave 'opcion' si no está definida
                            $existingRespuesta['opcion'] = $respuesta['opcion'];
                        }

                        $existingRespuesta['required']  = $respuesta['required'];

                        $found = true;
                        break;
                    else :

                        array_push($this->repuestas, $respuesta);

                        $found = true;
                        break;
                    endif;

                    break;

                case '4':
                    if ($existingRespuesta['pregunta_id'] == $respuesta['pregunta_id']) :
                        // Si ya existe, actualiza el valor de opcion_id y required
                        $existingRespuesta['opcion_id']  = $respuesta['opcion_id'];
                        $existingRespuesta['required']   = $respuesta['required'];

                        if (isset($respuesta['comentario'])) :
                            $existingRespuesta['comentario'] = $respuesta['comentario'];
                        endif;

                        $found = true;
                        break;
                    endif;
                    break;
                default:

                    break;
            endswitch;

        endforeach;

        // Si no se encontró la pregunta_id, agregar la nueva respuesta
        if (!$found) :
            $this->repuestas[] = $respuesta;
        endif;
    }

    /**
     * Almacenar respuestas de la evaluación
     *
     * @return void
     */
    public function store()
    {
        if ($this->repuestas) :
            $preguntas_requeridas = $this->obtenerPreguntas($this->instrumento->id);
            $respuestas_ids = $this->obtenerIdsRespuestas($this->repuestas);
            $faltantes = $this->obtenerPreguntasFaltantes($preguntas_requeridas, $respuestas_ids);

            // buscar comentarios pendientes
            $comentario_pendiente = false;
            $pregunta_id = '';

            foreach ($this->repuestas as $respuesta) {
                if ($respuesta['tipo_pregunta'] == 4 && $respuesta['comentario'] == '') :
                    $comentario_pendiente = true;
                    $pregunta_id = $respuesta['pregunta_id'];
                    break;
                endif;
            }

            if ($comentario_pendiente == true) :
                $this->manejarRespuestasFaltantes($pregunta_id);
                return;
            endif;

            if (empty($faltantes)) {
                $this->guardarRespuestas($this->repuestas);

                // redireccionar a la siguente seccion
                $this->redireccionarSiguienteSeccion();
            } else {
                $this->manejarRespuestasFaltantes($faltantes);
            }
        else :
            $this->alert('info', 'Completa todas las preguntas');
        endif;
    }

    private function redireccionarSiguienteSeccion()
    {

        $evaluacion = EvaEvaluacione::find($this->evaluacion_id);

        $secciones = InsInstrumentosSeccione::where('instrumento_id', $evaluacion->instrumento_id)
            ->where('estado', 1)
            ->get();

        $siguiente_seccion_id = 0;

        if ($secciones->count() > 0) :
            foreach ($secciones as $seccion) :
                if ($seccion->id > $this->seccion_id) :
                    $siguiente_seccion_id = $seccion->id;
                endif;
            endforeach;
        else :
            return $this->mostrarMensajeExito();
        endif;


        if ($siguiente_seccion_id > 0) :
            return redirect()
                ->route('estudiantes.evaluaciones.seccion', [
                    'evaluacion_id' => $evaluacion->id,
                    'seccion_id' => $seccion->id
                ]);
        else :
            return $this->mostrarMensajeExito();
        endif;
    }

    private function obtenerPreguntas($cuestionario_id)
    {
        return InsInstrumentosPregunta::where('cuestionario_id', $cuestionario_id)
            ->select('id')
            ->get()
            ->pluck('id')
            ->toArray();
    }

    private function obtenerIdsRespuestas($respuestas)
    {
        return array_column($respuestas, 'pregunta_id');
    }

    private function obtenerPreguntasFaltantes($requeridas, $respondidas)
    {
        $this->contador_preguntas_pendiente = array_diff($requeridas, $respondidas);
        return $this->contador_preguntas_pendiente;
    }

    private function verificarComentariosRequeridos($faltantes)
    {
        $faltantes_con_comentario = [];
        foreach ($this->repuestas as $respuesta) {
            $pregunta = InsInstrumentosPregunta::find($respuesta['pregunta_id']);
            if ($pregunta && $pregunta->tipo_pregunta_id == 4 && array_key_exists('opcion_id', $respuesta) && empty($respuesta['comentario'])) {
                $faltantes_con_comentario[] = $respuesta['pregunta_id'];
            }
        }
        return $faltantes_con_comentario;
    }

    private function guardarRespuestas($respuestas)
    {

        foreach ($respuestas as $respuesta) {

            if (array_key_exists('opcion', $respuesta)) {
                foreach ($respuesta['opcion'] as $opcion) {
                    $this->crearRespuesta($opcion['pregunta_id'], $opcion['opcion_id'], null);
                }
            }

            if (array_key_exists('opcion_id', $respuesta)) {
                $comentario = $respuesta['comentario'] ?? null;
                $this->crearRespuesta($respuesta['pregunta_id'], $respuesta['opcion_id'], $comentario);
            }
        }
    }

    private function crearRespuesta($pregunta_id, $opcion_id, $comentario)
    {

        EvaEvaluacionesRespuesta::create([
            'usuario_encuestado' => Auth::user()->name,
            'evaluacion_id'      => $this->evaluacion_id,
            'seccion_id'         => $this->seccion_id,
            'pregunta_id'        => $pregunta_id,
            'opcion_id'          => $opcion_id,
            'comentario'         => $comentario
        ]);
    }

    private function mostrarMensajeExito()
    {
        $this->flash('success', 'Respuestas guardadas exitosamente.', [], route('estudiantes.evaluaciones.secciones', ['evaluacion_id' => $this->evaluacion_id]));
    }

    private function manejarRespuestasFaltantes($pregunta_faltante)
    {

        $buscar_regisro_pregunta = InsInstrumentosPregunta::where('id', $pregunta_faltante)
            ->get();

        $regisro_pregunta = $buscar_regisro_pregunta->first();

        //dd($regisro_pregunta);

        $this->dispatchBrowserEvent('focusPregunta', [
            'preguntaId' => $regisro_pregunta->id,
            'subNumeral' => $regisro_pregunta->sub_numeral,
            'seccionId' => $this->seccion['literal'],
        ]);

        $regisro_pregunta = [];
    }

    private function alertaEvaluacionIncompleta()
    {
        $this->alert('warning', 'Debes completar la evaluación al 100%');
    }
}
