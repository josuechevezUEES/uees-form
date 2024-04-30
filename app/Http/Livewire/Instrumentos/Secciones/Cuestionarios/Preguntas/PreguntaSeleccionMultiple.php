<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use Livewire\Component;

class PreguntaSeleccionMultiple extends Component
{

    public $opciones_seleccionada = [];
    public $pregunta, $seccion;

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-seleccion-multiple');
    }
}
