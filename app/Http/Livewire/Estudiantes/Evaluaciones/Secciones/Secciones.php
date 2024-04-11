<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones\Secciones;

use App\Models\EvaEvaluacione;
use Illuminate\Http\Request;
use Livewire\Component;

class Secciones extends Component
{
    public string $evaluacion_id;
    public string $instrumento_id;
    public EvaEvaluacione $evaluacion;

    public function mount(Request $request)
    {
        $this->evaluacion_id = $request->evaluacion_id;
        $this->evaluacion = EvaEvaluacione::find($request->evaluacion_id);
    }

    public function render()
    {
        return view('livewire.estudiantes.evaluaciones.secciones.secciones');
    }
}
