<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones;

use App\Models\TiposEvaluacione;
use App\Models\TiposEvaluado;
use App\Models\TiposEvaluadore;
use Illuminate\Http\Request;
use Livewire\Component;

class Configuraciones extends Component
{

    public $tipo_evaluacion_id;
    public $tipo_evaluacion = [];

    public int $evaluador_id, $evaluado_id;

    public $evaluadores = [], $evaluados = [];

    /**
     * Webhook change emitido desde el input con la
     * propiedad evaluador_id
     *
     * @param integer $evaluador_id
     * @return void
     */
    public function updatedEvaluadorId(int $evaluador_id): void
    {
        $this->evaluados = TiposEvaluado::where('estado', 1)
            ->get();
    }

    /**
     * Inicializacion de component
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->tipo_evaluacion_id = $request->tipo_evaluacion_id;
        $this->tipo_evaluacion = TiposEvaluacione::find($this->tipo_evaluacion_id);

        $this->evaluadores = TiposEvaluadore::where('estado', 1)
            ->get();

        $this->evaluados = TiposEvaluado::where('estado', 1)
            ->get();
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.configuraciones');
    }
}
