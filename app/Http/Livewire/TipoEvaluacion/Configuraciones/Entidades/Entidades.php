<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones\Entidades;

use App\Models\TiposEvaluado;
use App\Models\TiposEvaluadore;
use App\Models\TpeConfiguracionEntidad;
use App\Models\TpeConfiguracionModalidad;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Entidades extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'enviar_evaluado' => 'enviar_evaluado',
        'agregrar_modalidad' => 'agregrar_modalidad',
        'eliminar_modalidad' => 'eliminar_modalidad',
    ];

    public string $configuracion_id;
    public string $evaluador_id = '';
    public string $evaluado_id = '';
    public $lista_modalidades = [];
    public $modalidades_seleccionadas;

    public TpeConfiguracionEntidad $configuracion_entidades;

    public $evaluadores = [], $evaluados = [];

    public function mount(string $configuracionId)
    {
        $this->configuracion_id = $configuracionId;

        $this->crear_coleccion_modalidades();

        $this->evaluadores = TiposEvaluadore::where('estado', 1)
            ->get();

        $this->obtener_modalidades();

        if ($this->configuracion_id) :
            $this->cargar_configuracion_entidades();
            if ($this->evaluador_id != '') :
                $this->updatedEvaluadorId($this->evaluador_id);

            endif;
        endif;
    }

    public function obtener_modalidades()
    {

        $this->modalidades_seleccionadas = TpeConfiguracionModalidad::where('tpe_configuracion_id', $this->configuracion_id)
            ->pluck('modalidad');
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

    /**
     * Evento click para iniciar el registro de la entidad
     *
     * @return void
     */
    public function guardar_configuracion()
    {
        $this->validate([
            'evaluador_id' => 'required',
            'evaluado_id' => 'required',
        ]);

        $this->verficar_configuracion_entidades_guardada();
    }

    /**
     * Registrar entidad
     *
     * @return void
     */
    public function guardar_entidades()
    {
        TpeConfiguracionEntidad::create([
            'tpe_configuracion_id' => $this->configuracion_id,
            'evaluador_id' => $this->evaluador_id,
            'evaluados_id' => $this->evaluado_id
        ]);

        $this->mount($this->configuracion_id);

        $this->alert('success', 'Entidades Creadas');
    }

    /**
     * Actualizar entidad
     *
     * @return void
     */
    public function actualizar_entidades()
    {
        TpeConfiguracionEntidad::updateOrCreate(
            ['tpe_configuracion_id' => $this->configuracion_id],
            ['evaluador_id' => $this->evaluador_id, 'evaluados_id' => $this->evaluado_id]
        );

        $this->alert('success', 'Entidades Actualizadas');
    }

    /**
     * Verficar si existe configuracion de entidades
     *
     * @return void
     */
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

    /**
     * Coleccion de modalidades
     *
     * @return void
     */
    public function crear_coleccion_modalidades()
    {
        $lista = new Collection();

        $lista->push([
            'id' => '01',
            'nombre' => 'Regular o Presencial'
        ]);

        $lista->push([
            'id' => '0',
            'nombre' => 'Semi Presencial'
        ]);

        $lista->push([
            'id' => '05',
            'nombre' => 'Modalidad Virtual'
        ]);

        $this->lista_modalidades = $lista;

        return $this->lista_modalidades;
    }

    /**
     * Agrega configuracion para las modadlidades seleccionadas
     *
     * @param string $codigo_modalidad
     * @return void
     */
    public function agregrar_modalidad($codigo_modalidad): void
    {
        TpeConfiguracionModalidad::create([
            'tpe_configuracion_id' => $this->configuracion_id,
            'modalidad' => $codigo_modalidad
        ]);

        $this->obtener_modalidades();

        $this->alert('success', 'Modalidad Vinculada.');
    }

    /**
     * Eliminar configuracion para las modadlidades seleccionadas
     *
     * @param string $codigo_modalidad
     * @return void
     */
    public function eliminar_modalidad($codigo_modalidad): void
    {
        TpeConfiguracionModalidad::where([
            'tpe_configuracion_id' => $this->configuracion_id,
            'modalidad' => $codigo_modalidad
        ])
            ->delete();

        $this->obtener_modalidades();

        $this->alert('success', 'Modalidad desvinculada.');
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.entidades.entidades');
    }
}
