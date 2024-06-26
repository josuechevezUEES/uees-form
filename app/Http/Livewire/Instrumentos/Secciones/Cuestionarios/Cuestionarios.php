<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios;

use App\Models\InsInstrumentosComentario;
use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosPregunta;
use App\Models\InsInstrumentosSeccione;
use App\Models\InstrumentoCuestionario;
use App\Models\TipTiposPregunta;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Cuestionarios extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'agregar_opcion' => 'agregar_opcion',
        'mount' => 'mount',
        'refresh' => 'refresh',
        'crearVinculacionOpcionPreguntas' => 'crearVinculacionOpcionPreguntas'
    ];

    public $instrumento_id, $seccion_id;
    public $seccion, $actualizar_formulario = false;
    public $selected_id, $keyWord, $cuestionario_id;
    public $sub_numeral, $requerido, $nombre;
    public $tipo_pregunta_id;
    public $tipos_preguntas = [];
    public $opciones_creadas = [];
    public $preguntas_instrumento = [];
    public $nombre_opcion, $comentario;

    public function actualizar_componentes_hijos($request)
    {
        $this->mount($request);
    }

    public function updatedTipoPreguntaId(string $value)
    {
        if ($value) :
            $this->opciones_creadas = [];
            $this->sub_numeral = $this->obtener_numero_total_preguntas() + 1;
        else :
            $this->nombre = null;
            $this->requerido = null;
            $this->nombre_opcion = null;
        endif;
    }

    public function obtener_numero_total_preguntas()
    {
        return InsInstrumentosPregunta::where('cuestionario_id', $this->cuestionario_id)
            ->get()
            ->count();
    }

    public function agregar_opcion()
    {
        $this->validate(
            [
                'nombre_opcion' => 'required'
            ],
            [
                'nombre_opcion.required' => 'El campo nombre opcion es obligatorio para agregar opciones'
            ]
        );

        if ($this->tipo_pregunta_id == '2') :
            if (count($this->opciones_creadas) == 0) :
                $buscar_tipo_pregunta = TipTiposPregunta::find($this->tipo_pregunta_id);

                array_push($this->opciones_creadas, [
                    'pregunta_id' => '',
                    'nombre'  => $this->nombre_opcion,
                    'entrada' => $buscar_tipo_pregunta->entrada,
                ]);

                $this->nombre_opcion = '';
            else :
                $this->alert('info', 'Las preguntas abiertas solo permiten una entrada...');
            endif;
        endif;


        if ($this->tipo_pregunta_id == '1') :
            $buscar_tipo_pregunta = TipTiposPregunta::find($this->tipo_pregunta_id);

            array_push($this->opciones_creadas, [
                'pregunta_id' => '',
                'nombre'  => $this->nombre_opcion,
                'entrada' => $buscar_tipo_pregunta->entrada,
            ]);

            $this->nombre_opcion = '';
        endif;


        if ($this->tipo_pregunta_id == '3') :
            $buscar_tipo_pregunta = TipTiposPregunta::find($this->tipo_pregunta_id);

            array_push($this->opciones_creadas, [
                'pregunta_id' => '',
                'nombre'  => $this->nombre_opcion,
                'entrada' => $buscar_tipo_pregunta->entrada,
            ]);

            $this->nombre_opcion = '';
        endif;

        if ($this->tipo_pregunta_id == '4') :
            $buscar_tipo_pregunta = TipTiposPregunta::find($this->tipo_pregunta_id);

            array_push($this->opciones_creadas, [
                'pregunta_id' => '',
                'nombre'  => $this->nombre_opcion,
                'entrada' => $buscar_tipo_pregunta->entrada,
            ]);

            $this->nombre_opcion = '';
        endif;
    }

    public function obtener_lista_tipos_preguntas()
    {
        $this->tipos_preguntas = TipTiposPregunta::where('estado', 1)
            ->get();
    }

    public function obtener_lista_preguntas()
    {
        $this->preguntas_instrumento = [];

        $this->preguntas_instrumento = InsInstrumentosPregunta::where('cuestionario_id', $this->cuestionario_id)
            ->orderBy('sub_numeral', 'ASC')
            ->get();
    }

    public function boot()
    {
    }

    public function refresh($instrumento_id = null, $seccion_id = null)
    {
        try {
            if ($this->actualizar_formulario == true) :
                $this->obtener_lista_tipos_preguntas();
                $this->instrumento_id = $instrumento_id;
                $this->seccion_id     = $seccion_id;
                $this->seccion        = InsInstrumentosSeccione::find($seccion_id);
                $this->verificar_existencia_cuestionario();
                $this->actualizar_formulario = false;
            endif;
        } catch (\Throwable $th) {
            abort(404, 'Cuestionario y seccion no encontrados ' . $th->getMessage());
        }
    }

    public function mount(Request $request)
    {
        try {
            $this->obtener_lista_tipos_preguntas();
            $this->instrumento_id = $request->instrumento_id;
            $this->seccion_id = $request->seccion_id;
            $this->seccion = InsInstrumentosSeccione::find($request->seccion_id);
            $this->verificar_existencia_cuestionario();
        } catch (\Throwable $th) {
            abort(404, 'Cuestionario y seccion no encontrados ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.cuestionarios');
    }

    /**
     * Buscar información del cuestionario para
     * la seccion, si encuentra información guarda el id en $cuestionario_id,
     * sino crear un nuevo cuestionario
     *
     * @return void
     */
    public function verificar_existencia_cuestionario()
    {
        $buscar_cuestionario = InstrumentoCuestionario::where('seccion_id', $this->seccion_id)
            ->get();

        if ($buscar_cuestionario->count() > 0) :
            $this->obtener_informacion_cuestionario($buscar_cuestionario->first());
        else :
            $this->crearte_cuestionario($this->seccion_id);
        endif;
    }

    /**
     * Obtener cuestionario de la seccion
     *
     * @param InstrumentoCuestionario $cuestionario
     * @return void
     */
    public function obtener_informacion_cuestionario(InstrumentoCuestionario $cuestionario)
    {
        $this->cuestionario_id = $cuestionario->id;
        $this->obtener_lista_preguntas();
    }

    /**
     * Crear nuevo cuestionario de la seccion
     *
     * @param string $seccion_id
     * @return void
     */
    public function crearte_cuestionario(string $seccion_id)
    {
        try {
            $crear_cuestionario = InstrumentoCuestionario::create([
                'seccion_id' => $seccion_id
            ]);

            $this->cuestionario_id = $crear_cuestionario->id;
        } catch (\Throwable $th) {
            abort(503, 'No puedo crear nuevo cuestionario' . $th->getMessage());
        }
    }

    public function crear()
    {
        $this->resetInput();

        $this->sub_numeral = $this->obtener_numero_total_preguntas() + 1;
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        // $this->cuestionario_id = null;
        $this->tipo_pregunta_id = null;
        $this->sub_numeral = null;
        $this->requerido = null;
        $this->nombre = null;
        $this->opciones_creadas = [];
        $this->nombre_opcion = null;
        $this->comentario = null;
    }

    public function store()
    {
        $this->validate(
            [
                'nombre' => 'required',
                'cuestionario_id' => 'required',
                'tipo_pregunta_id' => 'required',
                'sub_numeral' => 'required',
                'requerido' => 'required',
            ],
            [
                'cuestionario_id.required' => 'El campo codigo cuestionario es obligatorio',
                'tipo_pregunta_id.required' => 'El campo tipo pregunta es obligatorio',
            ]
        );

        $nueva_pregunta = InsInstrumentosPregunta::create([
            'nombre'           => $this->nombre,
            'cuestionario_id'  => $this->cuestionario_id,
            'tipo_pregunta_id' => $this->tipo_pregunta_id,
            'sub_numeral'      => $this->sub_numeral,
            'requerido'        => $this->requerido,
            'comentario'       => $this->comentario
        ]);

        foreach ($this->opciones_creadas as $opciones) :
            InsInstrumentosOpcione::create([
                'pregunta_id' => $nueva_pregunta->id,
                'nombre'      => $opciones['nombre'],
                'entrada'     => $opciones['entrada'],
            ]);
        endforeach;

        if ($this->tipo_pregunta_id == '4') :
            InsInstrumentosComentario::create([
                'pregunta_id' => $nueva_pregunta->id,
                'comentario' => $this->comentario,
            ]);
        endif;

        $this->obtener_lista_preguntas();
        $this->dispatchBrowserEvent('closeModal');
        $this->alert('success', 'Pregunta Creada');
        $this->resetInput();

        $this->actualizar_formulario = true;
        $this->emitSelf('refresh', $this->instrumento_id, $this->seccion_id);
    }

    public function edit($id)
    {
        $record = InsInstrumentosPregunta::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre = $record->nombre;
        $this->cuestionario_id = $record->cuestionario_id;
        $this->tipo_pregunta_id = $record->tipo_pregunta_id;
        $this->sub_numeral = $record->sub_numeral;
        $this->requerido = $record->requerido;
    }

    public function update()
    {
        $this->validate(
            [
                'nombre'           => 'required',
                'cuestionario_id'  => 'required',
                'tipo_pregunta_id' => 'required',
                'sub_numeral'      => 'required',
                'requerido'        => 'required',
            ],
            [
                'cuestionario_id.required' => 'El campo codigo cuestionario es obligatorio',
                'tipo_pregunta_id.required' => 'El campo tipo pregunta es obligatorio',
            ]
        );

        if ($this->selected_id) {
            $record = InsInstrumentosPregunta::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'cuestionario_id' => $this->cuestionario_id,
                'tipo_pregunta_id' => $this->tipo_pregunta_id,
                'sub_numeral' => $this->sub_numeral,
                'requerido' => $this->requerido,
                'comentario' => $this->comentario
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            $this->alert('success', 'Pregunta actualizada');
        }
    }

    /**
     * Mostrar form para vincular preguntas que estarán disponibles
     * al activar o seleccionar una opcion
     *
     * @param string $opcionId
     * @return void
     */
    public function crearVinculacionOpcionPreguntas($opcionId): void
    {
        $this->alert('success', 'Enviar mensaje '.$opcionId);
    }

    public function eliminar_opcion_vista_preva($index_opcion)
    {
        unset($this->opciones_creadas[$index_opcion]);
        $this->alert('info', 'Opcion Eliminada');
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosPregunta::where('id', $id)->delete();
            $this->alert('success', 'Pregunta eliminada');
        }
    }
}
