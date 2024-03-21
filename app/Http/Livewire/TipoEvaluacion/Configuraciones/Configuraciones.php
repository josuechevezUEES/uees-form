<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones;

use App\Models\TiposEvaluacione;
use App\Models\TpeConfiguracion;
use Illuminate\Http\Request;
use Livewire\Component;

class Configuraciones extends Component
{

    protected $listeners = ['obtener_evaluado'];

    public $tipo_evaluacion_id, $evaluado_id;
    public $configuracion_id;
    public  TiposEvaluacione $tipo_evaluacion;

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

        $this->verificar_crearcion_configuracion();
    }

    /**
     * Crear configuracion para el tipo de evaluacion
     *
     * @return TpeConfiguracion
     */
    public function crear_configuracion()
    {
        $configuracion = TpeConfiguracion::create([
            'tipo_evaluacion_id' => $this->tipo_evaluacion_id
        ]);

        return $configuracion;
    }

    /**
     * verificar configuracion del tipo de evaluacion
     *
     * @return void
     */
    public function verificar_crearcion_configuracion(): void
    {
        $verificar = TpeConfiguracion::where('tipo_evaluacion_id', $this->tipo_evaluacion_id)
            ->get();

        if ($verificar->count() == 0) :
            $configuracion = $this->crear_configuracion();
            $this->configuracion_id = $configuracion->id;
        else :
            $this->configuracion_id = $verificar->first()->id;
        endif;
    }

    public function obtener_evaluado($evaluado_id): void
    {
        $this->evaluado_id = '';
        $this->evaluado_id = $evaluado_id;
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.configuraciones');
    }
}
