<?php

namespace App\Http\Livewire\Estudiantes\Cuestionario\PreguntaAbierta;

use Livewire\Component;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PreguntaAbierta extends Component
{
    use LivewireAlert;

    protected $listeners = ['respuestaPregunta' => 'respuestaPregunta'];

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosSeccione $seccion;
    public array  $opcion_seleccionada;
    public string $comentario;

    public function updatedComentario($nuevo_valor)
    {
        $this->opcion_seleccionada = [];

        if ($nuevo_valor) :
            $this->opcion_seleccionada = [
                'pregunta_id' => $this->pregunta->id,
                'opcion_id'  => $this->pregunta->opciones->first()->id,
                'required'   => $this->pregunta->requerido,
                'comentario' => $nuevo_valor,
                'tipo_pregunta' => 2
            ];

            $this->emitUp('obtenerRespuesta', $this->opcion_seleccionada);
        else :
            $this->comentario = "";
        endif;
    }

    public function seleccionarOpcion($opcion_seleccionada)
    {
        if ($opcion_seleccionada) :
            $this->opcion_seleccionada = [
                'pregunta_id' => $this->pregunta->id,
                'opcion_id' => $opcion_seleccionada,
                'required' => $this->pregunta->requerido,
                'comenario' => $this->comentario
            ];

            $this->emitUp('obtenerRespuesta', $this->opcion_seleccionada);
        else :
            $this->opcion_seleccionada = [];
        endif;
    }

    public function enviar_opciones($opcion_seleccionada)
    {
        $this->opcion_seleccionada = [
            'pregunta_id' => $this->pregunta->id,
            'opcion_id' => $opcion_seleccionada,
            'required' => $this->pregunta->requerido,
            'comenario' => $this->comentario
        ];
    }

    public function render()
    {
        return view('livewire.estudiantes.cuestionario.pregunta-abierta.pregunta-abierta');
    }
}
