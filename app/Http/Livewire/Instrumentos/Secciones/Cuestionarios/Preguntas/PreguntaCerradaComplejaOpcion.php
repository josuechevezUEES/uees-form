<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use Livewire\Component;
use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PreguntaCerradaComplejaOpcion extends Component
{
    use LivewireAlert;

    public InsInstrumentosPregunta $pregunta;
    public InsInstrumentosSeccione $seccion;
    public InsInstrumentosOpcione $opcion;
    public $loop;
    public $activar_edicion = false;
    public string $nombre_opcion;
    public string $entrada_opcion;


    public function updatedEntradaOpcion($value)
    {
        if ($value == 'on') :
            $this->emitUp('mostrar_comentario');
        endif;
    }

    public function updatedNombreOpcion($value)
    {
        if ($value != 'on' || $value != 'off') :
            $this->opcion->nombre = $value;
            $this->opcion->save();
        endif;
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-compleja-opcion');
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
