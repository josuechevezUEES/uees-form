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
    public $activar_edicion_mascara = false;
    public string $nombre_pregunta;
    public string $nuevo_nombre_opcion;
    public string $nombre_mascara;
    public $mostrar_formulario = false;

    public function updatedNombrePregunta($value)
    {
        $this->pregunta->nombre = $value;
        $this->pregunta->save();
    }
    
    public function mount()
    {
        $this->nombre_mascara = $this->pregunta->opcionPreguntaAbierta->nombre;
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

    public function activar_edicion_mascara()
    {
        $this->nombre_mascara = $this->pregunta->opcionPreguntaAbierta->nombre;
        $this->activar_edicion_mascara = true;
    }

    public function desactivar_edicion_mascara()
    {
        $this->activar_edicion_mascara = false;
        $this->pregunta->opcionPreguntaAbierta->nombre = $this->nombre_mascara;
        $this->pregunta->opcionPreguntaAbierta->save();
    }
}
