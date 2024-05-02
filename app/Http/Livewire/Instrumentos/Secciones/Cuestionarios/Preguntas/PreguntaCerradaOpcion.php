<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PreguntaCerradaOpcion extends Component
{
    use LivewireAlert;

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosSeccione $seccion;
    public InsInstrumentosOpcione $opcion;
    public $loop;
    public $activar_edicion = false;
    public string $nombre_opcion;

    public function updatedNombreOpcion($value)
    {
        $this->opcion->nombre = $value;
        $this->opcion->save();
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-opcion');
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
        $this->alert('success','Opcion Eliminada');
    }
}
