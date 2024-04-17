<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones\Secciones;

use App\Models\EvaEvaluacione;
use App\Models\InsInstrumentosSeccione as InstrumentoSeccion;
use App\Models\InstrumentoCuestionario as InstrumentoCuestionario;
use Illuminate\Http\Request;
use Livewire\Component;

class Secciones extends Component
{
    public string $evaluacion_id;
    public string $instrumento_id;
    public string $seccion_id;
    public string $cuestionario_id;

    public InstrumentoSeccion $seccion;
    public EvaEvaluacione $evaluacion;
    public InstrumentoCuestionario $cuestionario;

    public function mount(Request $request)
    {
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
}
