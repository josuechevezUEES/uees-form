<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use Livewire\Component;

class PreguntaCerradaCompleja extends Component
{
    public $pregunta, $seccion, $mostrar_comentario = false;
    public $opcion = '', $comentario = '';

    public function updatedOpcion($value)
    {
        $this->mostrar_comentario = false;
        
        if ($value != "") :
            $this->mostrar_comentario = true;
        else :
            $this->mostrar_comentario = false;
        endif;
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-compleja');
    }
}
