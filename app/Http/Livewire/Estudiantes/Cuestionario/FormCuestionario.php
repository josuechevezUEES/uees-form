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
    public $evaluacion;
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

            if ($existingRespuesta['pregunta_id'] == $respuesta['pregunta_id']) :
                // Si ya existe, actualiza el valor de opcion_id y required
                $existingRespuesta['opcion_id'] = $respuesta['opcion_id'];
                $existingRespuesta['required'] = $respuesta['required'];
                $found = true;
                break;
            endif;
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
        if ($this->repuestas) {

            $preguntas_requeridas = InsInstrumentosPregunta::where('cuestionario_id', $this->instrumento->id)
                ->select('id')
                ->get()
                ->pluck('id')
                ->toArray();

            // Obtener todos los pregunta_id de las respuestas
            $respuestas_ids = array_column($this->repuestas, 'pregunta_id');

            // Encontrar las preguntas requeridas que no están en las respuestas
            $faltantes = array_diff($preguntas_requeridas, $respuestas_ids);

            if (empty($faltantes)) {
                // Todas las preguntas requeridas tienen respuesta
                foreach ($this->repuestas as $repuesta) {
                    EvaEvaluacionesRespuesta::create([
                        'usuario_encuestado' => Auth::id(),
                        'evaluacion_id' => $this->evaluacion_id,
                        'seccion_id' => $this->seccion_id,
                        'pregunta_id' => $repuesta['pregunta_id'],
                        'opcion_id' => $repuesta['opcion_id'],
                        'comentario' => null
                    ]);
                }

                // enviar alerta de registro exitoso
                $this->alert('success', 'Respuestas guardadas exitosamente.');
            } else {
                // Hay preguntas requeridas sin respuesta
                $primer_faltante = reset($faltantes);
                // $this->focus_pregunta = $primer_faltante;

                $this->dispatchBrowserEvent('focusPregunta', [
                    'preguntaId' => $primer_faltante,
                    'seccionId' => $this->seccion_id
                ]);

                // $this->alert('warning', "Falta respuesta para la pregunta con ID: $primer_faltante");
            }
        } else {
            $this->alert('warning', 'Debes completar los campos requeridos');
        }
    }
}
