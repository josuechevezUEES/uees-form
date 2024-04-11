<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones;

use App\Models\EvaEvaluacione;
use Livewire\Component;

class Evaluaciones extends Component
{

    protected function buscar_evaluaciones_activas_estudiante()
    {
        // Obtener la fecha y hora actual
        $fechaHoraActual = now();

        // Buscar todas las evaluaciones activas
        $evaluacionesActivas = EvaEvaluacione::where('estado', 1)
            ->get();

        // Mapear sobre las evaluaciones para agregar el atributo 'disponible' según la fecha actual
        $evaluacionesActivas->map(function ($evaluacion) use ($fechaHoraActual) {

            // Verificar si la fecha actual está dentro del rango de fechas de la evaluación
            if ($evaluacion->fecha_inicio_evaluacion <= $fechaHoraActual && $evaluacion->fecha_fin_evaluacion >= $fechaHoraActual) {
                $evaluacion->disponible = true;
            } else {
                $evaluacion->disponible = false;
            }

            return $evaluacion;
        });

        return $evaluacionesActivas;
    }


    public function render()
    {
        return view('livewire.estudiantes.evaluaciones.evaluaciones', [
            'evaluaciones' => $this->buscar_evaluaciones_activas_estudiante()
        ]);
    }
}
