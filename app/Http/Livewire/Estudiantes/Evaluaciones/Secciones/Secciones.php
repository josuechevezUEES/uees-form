<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones\Secciones;

use App\Models\EvaEvaluacione;
use App\Models\InsInstrumentosSeccione as InstrumentoSeccion;
use App\Models\InstrumentoCuestionario as InstrumentoCuestionario;
use Illuminate\Http\Request;
use Livewire\Component;

class Secciones extends Component
{
    public string $evaluacion_id;
    public string $instrumento_id;
    public string $seccion_id;
    public string $cuestionario_id;

    public $respuestas = [],  $validaciones = [];

    public InstrumentoSeccion $seccion;
    public EvaEvaluacione $evaluacion;
    public InstrumentoCuestionario $cuestionario;

    public function mount(Request $request)
    {
        $this->seccion_id = $request->seccion_id;
        $this->seccion = InstrumentoSeccion::find($request->seccion_id);
        $this->cuestionario = InstrumentoCuestionario::where('seccion_id', $request->seccion_id)
            ->get()
            ->first();
    }

    public function render()
    {
        return view('livewire.estudiantes.evaluaciones.secciones.secciones');
    }


    /**
     * Generar validaciones de cada pregunta
     *
     * @return void
     */
    public function array_validaciones()
    {
        $validaciones = [];
    
        foreach ($this->cuestionario->instrumentoPreguntas as $pregunta) {
            if ($pregunta->requerido == true) {
                // Construye el nombre del campo como una cadena en lugar de un array asociativo
                $campo = $this->seccion->literal . "." . $pregunta->sub_numeral;
                // Agrega el campo y su validación directamente al array $validaciones
                $validaciones[$campo] = 'required';
            }
        }
    
        $this->validaciones = $validaciones;
    
        return $validaciones;
    }
    
    public function almacenar()
    {
        // Obtén el arreglo de validaciones
        $validaciones = $this->array_validaciones();

        // Usa el método validate() para validar los datos con las reglas generadas
        // $this->validate($validaciones);

        // verificar respuesta para evaluacion

        // alamacenar informacion

    }
}
