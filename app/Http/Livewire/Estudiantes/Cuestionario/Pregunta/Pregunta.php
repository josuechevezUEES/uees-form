<?php

namespace App\Http\Livewire\Estudiantes\Cuestionario\Pregunta;

use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Pregunta extends Component
{
    use LivewireAlert;

    protected $listeners = ['respuestaPregunta' => 'respuestaPregunta'];

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosSeccione $seccion;
    public $opcion_seleccionada = [];

    public function seleccionarOpcion($opcion_seleccionada)
    {
        if ($opcion_seleccionada) :
            $this->opcion_seleccionada = [
                'pregunta_id' => $this->pregunta->id,
                'opcion_id' => $opcion_seleccionada,
                'required' => $this->pregunta->requerido,
                'tipo_pregunta' => 1
            ];

            $this->emitUp('obtenerRespuesta', $this->opcion_seleccionada);
        else :
            $this->opcion_seleccionada = [];
        endif;
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.estudiantes.cuestionario.pregunta.pregunta');
    }
}
