<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones\Evaluacion;

use App\Models\EvaEvaluacione;
use App\Models\InsInstrumentosEvaluacione;
use App\Models\InsInstrumentosSeccione;
use App\Models\InstrumentoCuestionario;
use App\Models\TiposEvaluacione;
use Illuminate\Http\Request;
use Livewire\Component;

class Evaluacion extends Component
{

    public string $evaluacion_id;
    public EvaEvaluacione $evaluacion;
    public $secciones = [];

    public function mount(Request $request)
    {
        $this->evaluacion_id = $request->evaluacion_id;
        $this->evaluacion = EvaEvaluacione::find($request->evaluacion_id);
        $this->secciones = InsInstrumentosSeccione::where('instrumento_id', $this->evaluacion->instrumento_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.estudiantes.evaluaciones.evaluacion.evaluacion');
    }
}
