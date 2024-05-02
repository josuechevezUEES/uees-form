<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use Livewire\Component;
use App\Models\InsInstrumentosPregunta;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PreguntaAbierta extends Component
{
    use LivewireAlert;

    protected $listeners = ['render' => 'render'];

    public InsInstrumentosPregunta $pregunta;
    public $seccion;
    public $activar_edicion = false;
    public string $nombre_pregunta;
    public string $nuevo_nombre_opcion;
    public $mostrar_formulario = false;

    public function updatedNombrePregunta($value)
    {
        $this->pregunta->nombre = $value;
        $this->pregunta->save();
    }
    
    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-abierta');
    }

    public function activar_edicion()
    {
        $this->nombre_pregunta = $this->pregunta->nombre;
        $this->activar_edicion = true;
    }

    public function desactivar_edicion()
    {
        $this->activar_edicion = false;
    }
}
