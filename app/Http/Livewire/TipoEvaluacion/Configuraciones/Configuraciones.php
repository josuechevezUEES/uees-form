<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones;

use App\Models\TiposEvaluacione;
use App\Models\TpeConfiguracion;
use App\Models\TpeConfiguracionEntidad;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Configuraciones extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'obtener_evaluado' => 'obtener_evaluado',
    ];

    public $tipo_evaluacion_id;
    public string $evaluado_id = '';
    public string $evaluador_id = '';
    public $configuracion_id;
    public TiposEvaluacione $tipo_evaluacion;
    public TpeConfiguracion $configuracion;
    public TpeConfiguracionEntidad $configuracion_entidades;

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

        if ($verificar->count() == 0) : # creacr configuracion
            $configuracion = $this->crear_configuracion();
            $this->configuracion = $configuracion;
            $this->configuracion_id = $configuracion->id;
        else : # obtener configuracion
            $configuracion_encontrada = $verificar->first();
            $this->obtener_configuracion($configuracion_encontrada);
            $this->obtener_configuracion_entidades($this->configuracion);
        endif;
    }

    /**
     * Obtener configuracion relaciona
     * al tipo de evaluacion
     *
     * @param TpeConfiguracion $configuracion
     * @return void
     */
    public function obtener_configuracion(TpeConfiguracion $configuracion)
    {
        $this->configuracion = $configuracion;
        $this->configuracion_id = $configuracion->id;
    }

    /**
     * Obtener datos de las entididades configuradas e
     * para la evaluacion
     *
     * @param TpeConfiguracion $configuracion
     * @return void
     */
    public function obtener_configuracion_entidades(TpeConfiguracion $configuracion)
    {
        $this->configuracion_entidades = $configuracion->configuracionEntidades;
        $this->evaluado_id = $this->configuracion_entidades->evaluados_id;
        $this->evaluador_id = $this->configuracion_entidades->evaluador_id;
    }

    public function obtener_evaluado(string $evaluado_id): void
    {
        $this->evaluado_id = $evaluado_id;
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.configuraciones');
    }
}
