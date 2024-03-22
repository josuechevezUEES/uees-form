<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones\Entidades;

use App\Models\TiposEvaluado;
use App\Models\TiposEvaluadore;
use App\Models\TpeConfiguracionEntidad;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Entidades extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'enviar_evaluado' => 'enviar_evaluado',
    ];

    public string $configuracion_id;
    public string $evaluador_id;
    public string $evaluado_id;

    public TpeConfiguracionEntidad $configuracion_entidades;

    public $evaluadores = [], $evaluados = [];

    public function mount(string $configuracionId)
    {
        $this->configuracion_id = $configuracionId;

        $this->evaluadores = TiposEvaluadore::where('estado', 1)
            ->get();

        if ($this->configuracion_id) :
            $this->cargar_configuracion_entidades();
            $this->updatedEvaluadorId($this->evaluador_id);
        endif;
    }

    public function enviar_evaluado()
    {
        $this->emitUp('obtener_evaluado', $this->evaluado_id);
    }

    public function servir_configuracion_entidades(TpeConfiguracionEntidad $configuracion_entidades)
    {
        $this->configuracion_entidades = $configuracion_entidades;
        $this->evaluador_id = $this->configuracion_entidades->evaluador_id;
        $this->evaluado_id  = $this->configuracion_entidades->evaluados_id;
    }

    public function cargar_configuracion_entidades()
    {
        $verificar = TpeConfiguracionEntidad::where('tpe_configuracion_id', $this->configuracion_id)
            ->get();

        if ($verificar->count() > 0) :
            $configuracion_entidades = $verificar->first();
            $this->servir_configuracion_entidades($configuracion_entidades);
        endif;
    }

    /**
     * Webhook change emitido desde el input con la
     * propiedad evaluado_id
     *
     * @param integer $evaluado_id
     * @return void
     */
    public function updatedEvaluadoId(string $evaluado_id): void
    {
        $this->emitUp('obtener_evaluado', $evaluado_id);
    }

    /**
     * Webhook change emitido desde el input con la
     * propiedad evaluador_id
     *
     * @param integer $evaluador_id
     * @return void
     */
    public function updatedEvaluadorId(string $evaluador_id): void
    {
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

    public function guardar_configuracion()
    {
        $this->validate([
            'evaluador_id' => 'required',
            'evaluado_id' => 'required',
        ]);

        $this->verficar_configuracion_entidades_guardada();
    }

    public function guardar_entidades()
    {
        TpeConfiguracionEntidad::create([
            'tpe_configuracion_id' => $this->configuracion_id,
            'evaluador_id' => $this->evaluador_id,
            'evaluados_id' => $this->evaluado_id
        ]);
    }

    public function actualizar_entidades()
    {
        TpeConfiguracionEntidad::updateOrCreate(
            ['tpe_configuracion_id' => $this->configuracion_id],
            ['evaluador_id' => $this->evaluador_id, 'evaluados_id' => $this->evaluado_id]
        );
    }

    public function verficar_configuracion_entidades_guardada()
    {
        $verificar = TpeConfiguracionEntidad::where([
            'tpe_configuracion_id' => $this->configuracion_id,
            'evaluador_id' => $this->evaluador_id,
            'evaluados_id' => $this->evaluado_id
        ])
            ->get();

        if ($verificar->count() > 0) :
            $this->actualizar_entidades();
        else :
            $this->guardar_entidades();
        endif;
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.entidades.entidades');
    }
}
