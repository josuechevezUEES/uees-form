<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PreguntaCerrada extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'render' => 'render',
    ];

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
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada');
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

    public function mostrar_formulario_nueva_opcion()
    {
        $this->mostrar_formulario = true;
    }

    public function almacenar_opcion()
    {
        $this->validate([
            'nuevo_nombre_opcion' => 'required'
        ], [
            'nuevo_nombre_opcion.required' => 'El nombre de la opcion es obligatorio'
        ]);

        InsInstrumentosOpcione::create([
            'pregunta_id' => $this->pregunta->id,
            'nombre'      => $this->nuevo_nombre_opcion,
            'entrada'     => $this->pregunta->tipTiposPregunta->entrada
        ]);

        $this->mostrar_formulario = false;
        $this->nuevo_nombre_opcion = '';

        $this->emitSelf('render');
        $this->alert('success', 'Opcion Agregada');
    }

    public function cancelar_almacenar_opcion()
    {
        $this->nuevo_nombre_opcion = '';
        $this->mostrar_formulario = false;
    }
}
