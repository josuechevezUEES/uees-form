<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones\Secciones;

use App\Models\EvaEvaluacione;
use App\Models\InsInstrumentosOpcione;
use App\Models\InsInstrumentosSeccione as InstrumentoSeccion;
use App\Models\InstrumentoCuestionario as InstrumentoCuestionario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Livewire\Component;

class Secciones extends Component
{

    protected $listeners  = ['agregar_opcion', 'eliminar_opcion'];

    public string $evaluacion_id;
    public string $instrumento_id;
    public string $seccion_id;
    public string $cuestionario_id;

    public $respuesta;

    protected $rules = [
        'opcion_id'     => 'required',
        'usuario_id'    => 'required',
        'evaluacion_id' => 'required',
        'seccion_id'    => 'required',
        'pregunta_id'   => 'required',
        'opcion_id'     => 'required',
        'comentario'    => 'required'
    ];


    public InstrumentoSeccion $seccion;
    public EvaEvaluacione $evaluacion;
    public InstrumentoCuestionario $cuestionario;


    public function mount(Request $request)
    {
        $this->respuesta = auth()->user()->cuestionarion_respuestas;
        $this->seccion_id = $request->seccion_id;
        $this->seccion = InstrumentoSeccion::find($request->seccion_id);
        $this->cuestionario = InstrumentoCuestionario::where('seccion_id', $request->seccion_id)
            ->get()
            ->first();
    }

    public function render()
    {
        return view('livewire.estudiantes.evaluaciones.secciones.secciones');
    }



    public function almacenar()
    {
        $this->validate();
    }
}
