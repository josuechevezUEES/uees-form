<?php

namespace App\Http\Livewire\Estudiantes\Cuestionario\Pregunta\Opcion;

use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Livewire\Component;

class Opcion extends Component
{

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosOpcione $opcion;
    public $loop;
    public InsInstrumentosSeccione $seccion;

    public string $opcion_seleccionada;

    public function seleccionarOpcion($value)
    {
        if ($value != null) :
            $this->opcion_seleccionada = $value;
        else :
            $this->opcion_seleccionada = '';
        endif;
    }


    public function render()
    {
        return view('livewire.estudiantes.cuestionario.pregunta.opcion.opcion');
    }
}
