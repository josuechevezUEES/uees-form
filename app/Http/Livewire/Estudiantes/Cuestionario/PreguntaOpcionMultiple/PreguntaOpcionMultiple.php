<?php

namespace App\Http\Livewire\Estudiantes\Cuestionario\PreguntaOpcionMultiple;

use Livewire\Component;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PreguntaOpcionMultiple extends Component
{
    use LivewireAlert;

    protected $listeners = ['respuestaPregunta' => 'respuestaPregunta'];

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosSeccione $seccion;
    public array  $opcion_seleccionada = [];
    public string $comentario = '';

    public function seleccionarOpcion($opcion_seleccionada)
    {
        if ($opcion_seleccionada) :
            $this->enviar_opciones($opcion_seleccionada);
            $this->emitUp('obtenerRespuesta', [
                'pregunta_id'   => $this->pregunta->id,
                'required'      => $this->pregunta->requerido,
                'comentario'    => $this->comentario ? $this->comentario : "",
                'tipo_pregunta' => 3,
                'opcion' => $this->opcion_seleccionada
            ]);

            $this->opcion_seleccionada = [];
        else :
            $this->opcion_seleccionada = [];
        endif;
    }

    public function enviar_opciones($opcion_seleccionada)
    {
        array_push($this->opcion_seleccionada, [
            'pregunta_id'   => $this->pregunta->id,
            'opcion_id'     => $opcion_seleccionada,
        ]);
    }

    public function render()
    {
        return view('livewire.estudiantes.cuestionario.pregunta-opcion-multiple.pregunta-opcion-multiple');
    }
}
