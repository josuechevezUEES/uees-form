<?php

namespace App\Http\Livewire\Instrumentos\Secciones\Cuestionarios;

use App\Models\InsInstrumentosSeccione;
use App\Models\InstrumentoCuestionario;
use Illuminate\Http\Request;
use Livewire\Component;

class Cuestionarios extends Component
{
    public $instrumento_id, $seccion_id;
    public $seccion;
    public $cuestionario_id;

    public function mount(Request $request)
    {
        try {
            $this->instrumento_id = $request->instrumento_id;
            $this->seccion_id = $request->seccion_id;
            $this->seccion = InsInstrumentosSeccione::find($request->seccion_id);
            $this->verificar_existencia_cuestionario();
        } catch (\Throwable $th) {
            abort(404, 'Cuestionario y seccion no encontrados');
        }
    }

    public function render()
    {
        return view('livewire.instrumentos.secciones.cuestionarios.cuestionarios');
    }

    /**
     * Buscar información del cuestionario para
     * la seccion, si encuentra información guarda el id en $cuestionario_id,
     * sino crear un nuevo cuestionario
     *
     * @return void
     */
    public function verificar_existencia_cuestionario()
    {
        $buscar_cuestionario = InstrumentoCuestionario::where('seccion_id', $this->seccion_id)
            ->get();

        if ($buscar_cuestionario->count() > 0) :
            $this->obtener_informacion_cuestionario($buscar_cuestionario->first());
        else :
            $this->crearte_cuestionario($this->seccion_id);
        endif;
    }

    /**
     * Obtener cuestionario de la seccion
     *
     * @param InstrumentoCuestionario $cuestionario
     * @return void
     */
    public function obtener_informacion_cuestionario(InstrumentoCuestionario $cuestionario)
    {
        $this->cuestionario_id = $cuestionario->id;
    }

    /**
     * Crear nuevo cuestionario de la seccion
     *
     * @param string $seccion_id
     * @return void
     */
    public function crearte_cuestionario(string $seccion_id)
    {
        try {
            $crear_cuestionario = InstrumentoCuestionario::create([
                'seccion_id' => $seccion_id
            ]);

            $this->cuestionario_id = $crear_cuestionario->id;
        } catch (\Throwable $th) {
            abort(503, 'No puedo crear nuevo cuestionario');
        }
    }
}
