<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios;

use Livewire\Component;

class VincularOpcionPreguntas extends Component
{
    public object $preguntas_instrumento;

    public string $opcionSeleccionada;
    public string $opcionIdVincular;

    public array $preguntasSeleccionadas = [];

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.vincular-opcion-preguntas');
    }

    /**
     * Agregar los id's de preguntas por vincular
     * a la opcion seleccionada
     *
     * @param string $preguntaId
     * @return void
     */
    public function agregarPreguntaPorVincular($preguntaId)
    {
        array_push($this->preguntasSeleccionadas, [
            'pregunta_id' => $preguntaId,
        ]);
    }

    public function eliminarPreguntaPorId($preguntaId)
    {
        // Encuentra el índice del elemento con el pregunta_id especificado
        $index = array_search($preguntaId, array_column($this->preguntasPorVincular, 'pregunta_id'));

        // Si el índice es válido, elimina el elemento del array
        if ($index !== false) {
            unset($this->preguntasSeleccionadas[$index]);

            // Reindexar el array para evitar índices no consecutivos
            $this->preguntasSeleccionadas = array_values($this->preguntasPorVincular);
        }
    }
}
