<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones\EvalStatisfaccionFacultad;

use App\Models\FacultadClass;
use App\Models\TpeConfiguracion;
use Livewire\Component;

class Facultad extends Component
{
    public $facultades = [], $facultades_seleccionadas = [];
    public $configuracion_id;

    public function mount($configuracionId)
    {
        $this->configuracion_id = $configuracionId;
        $this->facultades = FacultadClass::select('CARCOD', 'CARDSC')
            ->where('CARSTS', 'S')
            ->orderBy('CARDSC', 'ASC')
            ->get();
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.eval-statisfaccion-facultad.facultad');
    }
}
