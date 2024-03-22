<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones\EvalStatisfaccionFacultad;

use App\Models\FacultadClass;
use App\Models\TpeConfiguracionesFacultade;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Facultad extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners  = [
        'agregrar_facultad' => 'agregrar_facultad',
        'eliminar_facultad' => 'eliminar_facultad'
    ];

    protected $paginationTheme = 'bootstrap';
    public string $contador_facultades;
    public $facultades_seleccionadas = [];
    public string $configuracion_id;

    public function mount($configuracionId)
    {
        $this->configuracion_id = $configuracionId;

        $this->contador_facultades = FacultadClass::select('CARCOD', 'CARDSC')
            ->where('CARSTS', 'S')
            ->get()
            ->count();

        $this->obtener_facultades_seleccionadas();
    }

    public function obtener_facultades_seleccionadas()
    {
        $this->facultades_seleccionadas = TpeConfiguracionesFacultade::where('tpe_configuracion_id', $this->configuracion_id)
            ->get()
            ->pluck('codigo_facultad');
    }

    /**
     * Agrega configuracion para la facultad seleccionada
     *
     * @param string $codigo_facultad
     * @return void
     */
    public function agregrar_facultad($codigo_facultad): void
    {
        TpeConfiguracionesFacultade::create([
            'codigo_facultad' => $codigo_facultad,
            'tpe_configuracion_id' => $this->configuracion_id
        ]);

        $this->obtener_facultades_seleccionadas();

        $this->alert('success', 'El registro se ha agregado correctamente.');
    }

    /**
     * Eliminar configuracion para la facultad seleccionada
     *
     * @param string $codigo_facultad
     * @return void
     */
    public function eliminar_facultad($codigo_facultad): void
    {
        TpeConfiguracionesFacultade::where('tpe_configuracion_id', $this->configuracion_id)
            ->where('codigo_facultad', $codigo_facultad)
            ->delete();

        $this->obtener_facultades_seleccionadas();

        $this->alert('success', 'El registro se ha eliminado correctamente.');
    }

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.eval-statisfaccion-facultad.facultad', [
            'facultades' => FacultadClass::select('CARCOD', 'CARDSC')
                ->where('CARSTS', 'S')
                ->orderBy('CARDSC', 'ASC')
                ->cursorPaginate(15)
        ]);
    }
}
