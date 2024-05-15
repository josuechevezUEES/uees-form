<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use Livewire\Component;

class PreguntaSeleccionMultipleOpcion extends Component
{
    public $seccion;
    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosOpcione $opcion;

    public $nombre_opcion = '';
    public $activar_edicion = false;

    public function updatedNombreOpcion($value)
    {
        if ($value != 'on' || $value != 'off') :
            $this->opcion->nombre = $value;
            $this->opcion->save();
        endif;
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-seleccion-multiple-opcion');
    }

    public function activar_edicion()
    {
        $this->nombre_opcion = $this->opcion->nombre;
        $this->activar_edicion = true;
    }

    public function desactivar_edicion()
    {
        $this->activar_edicion = false;
    }

    public function eliminar_opcion()
    {
        $this->opcion->delete();
        $this->emitUp('render');
        $this->alert('success', 'Opcion Eliminada');
    }
}
