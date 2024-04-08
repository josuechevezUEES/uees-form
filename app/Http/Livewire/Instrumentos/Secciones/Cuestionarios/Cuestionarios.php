<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios;

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

    public $instrumento_id, $seccion_id;
    public $seccion;
    public $selected_id, $keyWord, $cuestionario_id, $tipo_pregunta_id;
    public $sub_numeral, $requerido, $nombre;
    public $tipos_preguntas = [];
    public $opciones_creadas = [];
    public $preguntas_instrumento = [];
    public $nombre_opcion;

    public function obtener_lista_tipos_preguntas()
    {
        $this->tipos_preguntas = TipTiposPregunta::where('estado', 1)
            ->get();
    }

    public function obtener_lista_preguntas()
    {
        $this->preguntas_instrumento = InsInstrumentosPregunta::where('cuestionario_id', $this->cuestionario_id)
            ->get();
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
            abort(404, 'Cuestionario y seccion no encontrados');
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
            abort(503, 'No puedo crear nuevo cuestionario');
        }
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
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'cuestionario_id' => 'required',
            'tipo_pregunta_id' => 'required',
            'sub_numeral' => 'required',
            'requerido' => 'required',
        ]);

        $nueva_pregunta = InsInstrumentosPregunta::create([
            'nombre' => $this->nombre,
            'cuestionario_id' => $this->cuestionario_id,
            'tipo_pregunta_id' => $this->tipo_pregunta_id,
            'sub_numeral' => $this->sub_numeral,
            'requerido' => $this->requerido
        ]);

        $this->obtener_lista_preguntas();
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->alert('success', 'Pregunta Creada');
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
        $this->validate([
            'nombre' => 'required',
            'cuestionario_id' => 'required',
            'tipo_pregunta_id' => 'required',
            'sub_numeral' => 'required',
            'requerido' => 'required',
        ]);

        if ($this->selected_id) {
            $record = InsInstrumentosPregunta::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'cuestionario_id' => $this->cuestionario_id,
                'tipo_pregunta_id' => $this->tipo_pregunta_id,
                'sub_numeral' => $this->sub_numeral,
                'requerido' => $this->requerido
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            $this->alert('success', 'Pregunta actualizada');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosPregunta::where('id', $id)->delete();
            $this->alert('success', 'Pregunta eliminada');
        }
    }
}
