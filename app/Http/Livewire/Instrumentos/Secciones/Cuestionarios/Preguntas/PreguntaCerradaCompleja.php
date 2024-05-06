<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\Preguntas;

use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PreguntaCerradaCompleja extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'render' => 'render',
        'mostrar_comentario' => 'mostrar_comentario'
    ];

    public $mostrar_comentario = false;
    public $opcion = '', $comentario = '';
    public InsInstrumentosPregunta $pregunta;
    public $seccion;
    public $activar_edicion = false;
    public $editar_comentario = false;

    public string $nombre_pregunta;
    public string $nuevo_nombre_opcion;

    public $mostrar_formulario = false;
    public $mostrar_text_area_comentario = false;

    public function updatedNombrePregunta($value)
    {
        $this->pregunta->nombre = $value;
        $this->pregunta->save();
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-compleja');
    }

    public function mostrar_comentario()
    {
        $this->mostrar_text_area_comentario = true;
    }

    public function ocultar_comentario()
    {
        $this->mostrar_text_area_comentario = false;
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

    public function activar_edicion_comentario()
    {
        $this->comentario = $this->pregunta->preguntaComentario->comentario;
        $this->editar_comentario = true;
    }

    public function desactivar_edicion_comentario()
    {
        $this->pregunta->preguntaComentario->comentario = $this->comentario;
        $this->pregunta->preguntaComentario->save();
        $this->comentario = '';

        $this->editar_comentario = false;
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
