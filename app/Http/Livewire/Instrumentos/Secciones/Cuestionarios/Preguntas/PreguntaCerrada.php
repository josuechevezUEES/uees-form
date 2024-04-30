<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use Livewire\Component;

class PreguntaCerrada extends Component
{
    public $pregunta, $seccion;

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada');
    }
}
