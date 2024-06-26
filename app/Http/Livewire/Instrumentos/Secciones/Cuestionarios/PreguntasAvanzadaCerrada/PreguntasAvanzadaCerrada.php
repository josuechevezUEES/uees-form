<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios\PreguntasAvanzadaCerrada;

use App\Models\TipTiposPregunta;
use Livewire\Component;
use Illuminate\Http\Request;

class PreguntasAvanzadaCerrada extends Component
{
    public $instrumento_id, $seccion_id;
    public $opciones = [];
    public $tituloPregunta = '';
    public $mostrarFormularioNuevaOpcion = false;
    public $mostrarFormularioNuevaAccionOpcion = false;
    public $nombreNuevaOpcion = '';
    public $opcionSelecionada = [];
    public $opcionAccionSeleccionada = '';

    // propiedades pregunta hija
    public string $tituloPreguntaHija;
    public string $tipoPreguntaSeleccionadaHija;
    public array  $opcionesPreguntaHija = [];
    public bool   $mostrarFormularioNuevaOpcionPreguntaHija =  false;
    public string $nombreNuevaOpcionHija;
    public array $preguntaHija = [];

    // Tipos de preguntas
    public object $tiposPreguntas;
    public string $vistaPreviaOpcionSeleccionada = '';
    public string $activarVitaPrevia = 'false';

    public function mount(Request $request)
    {
        try {
            $this->tiposPreguntas = TipTiposPregunta::where('estado', 1)
                ->get();
            $this->instrumento_id = $request->instrumento_id;
            $this->seccion_id = $request->seccion_id;
        } catch (\Throwable $th) {
            abort(404, 'Cuestionario y seccion no encontrados ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.preguntas-avanzada-cerrada.preguntas-avanzada-cerrada');
    }

    public function crearNuevaOpcion()
    {
        $this->mostrarFormularioNuevaOpcion = true;
    }

    public function agregarOpcion()
    {
        $this->mostrarFormularioNuevaOpcion = false;
        array_push($this->opciones, [
            'nombre'         => $this->nombreNuevaOpcion,
            'instrumento_id' => $this->instrumento_id,
            'seccion_id'     => $this->seccion_id
        ]);

        $this->nombreNuevaOpcion = '';
        $this->mostrarFormularioNuevaOpcion = false;
    }

    /**
     * Mostrar formulario para la configuracion de
     * acciones por opcion de la pregunta
     *
     * @return void
     */
    public function mostrarNuevaAccionPorOpcion($opcionId): void
    {
        $this->mostrarFormularioNuevaAccionOpcion =  true;
        $this->opcionSelecionada = $opcionId;
    }

    public function crearNuevaOpcionHija(): void
    {
        $this->mostrarFormularioNuevaOpcionPreguntaHija = true;
    }

    public function agregarOpcionHija()
    {
        $this->mostrarFormularioNuevaOpcionPreguntaHija = false;

        // Buscar tipo de pregunta
        $tipoPregunta = TipTiposPregunta::find($this->tipoPreguntaSeleccionadaHija);

        array_push($this->opcionesPreguntaHija, [
            'nombre'         => $this->nombreNuevaOpcionHija,
            'instrumento_id' => $this->instrumento_id,
            'seccion_id'     => $this->seccion_id,
            'opcionSelecionada'  => $this->opcionSelecionada,
        ]);

        $this->nombreNuevaOpcionHija = '';
        $this->mostrarFormularioNuevaOpcionPreguntaHija = false;
    }

    public function guardarPregunta(): void
    {
        $this->opciones[$this->opcionSelecionada]['accion'] = 'true';

        $this->preguntaHija = [
            'nombre' => $this->tituloPreguntaHija,
            'opciones' => $this->opcionesPreguntaHija
        ];

        $this->activarVitaPrevia = 'true';
    }

    public function mostrarVistaPreviaMostrarPreguntaHija(string $preguntaHijaPosicion): void
    {

        $this->vistaPreviaOpcionSeleccionada = $preguntaHijaPosicion;
    }
}
