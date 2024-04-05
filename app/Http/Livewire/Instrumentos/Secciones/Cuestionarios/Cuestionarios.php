<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios;

use App\Models\InsInstrumentosSeccione;
use Illuminate\Http\Request;
use Livewire\Component;

class Cuestionarios extends Component
{
    public $instrumento_id, $seccion_id;
    public $seccion;

    public function mount(Request $request)
    {
        $this->instrumento_id = $request->instrumento_id;
        $this->seccion_id = $request->seccion_id;
        $this->seccion = InsInstrumentosSeccione::find($request->seccion_id);
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.cuestionarios');
    }
}
