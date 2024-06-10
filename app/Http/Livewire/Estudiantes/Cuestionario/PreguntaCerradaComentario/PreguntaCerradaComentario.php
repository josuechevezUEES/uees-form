<?php

namespace App\Http\Livewire\Estudiantes\Cuestionario\PreguntaCerradaComentario;

use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PreguntaCerradaComentario extends Component
{
    use LivewireAlert;

    protected $listeners = ['respuestaPregunta' => 'respuestaPregunta'];

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosSeccione $seccion;
    public $opcion_seleccionada = [];
    public string $comentario = '';
    public $opcion = '';
    public $habilitar_comentario = false;

    /**
     * Envento change del los radio buttons
     *
     * @param string $opcion_seleccionada
     * @return void
     */
    public function seleccionarOpcion($opcion_seleccionada)
    {
        if ($opcion_seleccionada) :

            $this->comentario = '';
            $this->opcion = $opcion_seleccionada;

            $this->opcion_seleccionada = [
                'pregunta_id'   => $this->pregunta->id,
                'opcion_id'     => $this->opcion,
                'required'      => $this->pregunta->requerido,
                'comentario'    => $this->comentario,
                'tipo_pregunta' => 4
            ];

            $this->habilitar_comentario = true;

            $this->emitUp('obtenerRespuesta', $this->opcion_seleccionada);
        else :
            $this->opcion_seleccionada = [];
            $this->habilitar_comentario = false;
            $this->comentario = '';
            $this->opcion = '';
        endif;
    }

    public function updatedComentario($comentario)
    {
        $this->opcion_seleccionada = [
            'pregunta_id'   => $this->pregunta->id,
            'opcion_id'     => $this->opcion,
            'required'      => $this->pregunta->requerido,
            'comentario'    => $comentario,
            'tipo_pregunta' => 4
        ];

        $this->emitUp('obtenerRespuesta', $this->opcion_seleccionada);
    }

    public function render()
    {
        return view('livewire.estudiantes.cuestionario.pregunta-cerrada-comentario.pregunta-cerrada-comentario');
    }
}
