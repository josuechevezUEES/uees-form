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

    public string $evaluador_id, $evaluado_id;

    public $evaluadores = [], $evaluados = [];

    /**
     * Webhook change emitido desde el input con la
     * propiedad evaluador_id
     *
     * @param integer $evaluador_id
     * @return void
     */
    public function updatedEvaluadorId(string $evaluador_id): void
    {
        $this->evaluado_id = '';

        switch ($evaluador_id) {
            case '1': # Docentes
                $this->evaluados = TiposEvaluado::where('estado', 1)
                    ->whereIn('id', [2, 3])
                    ->get();
                break;

            case '2': # Coordinadores
                $this->evaluados = TiposEvaluado::where('estado', 1)
                    ->whereIn('id', [1, 3])
                    ->get();
                break;

            case '3': # Estudiantes
                $this->evaluados = TiposEvaluado::where('estado', 1)
                    ->whereIn('id', [1, 3])
                    ->get();
                break;

            default:
                $this->evaluados = [];
                break;
        }
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
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.configuraciones');
    }
}
