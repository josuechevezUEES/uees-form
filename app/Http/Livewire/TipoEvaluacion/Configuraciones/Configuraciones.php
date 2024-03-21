<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones;

use Illuminate\Http\Request;
use Livewire\Component;

class Configuraciones extends Component
{

    public $tipo_evaluacion_id;

    /**
     * Inicializacion de component
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->tipo_evaluacion_id = $request->tipo_evaluacion_id;
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.configuraciones');
    }
}
