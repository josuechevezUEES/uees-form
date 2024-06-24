<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

/**
 * Pregunta cerrada que permite a las opciones
 * realizar acciones o comportamiento unico
 */

use Livewire\Component;

class PreguntaCerradaAnidada extends Component
{
    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-anidada');
    }
}
