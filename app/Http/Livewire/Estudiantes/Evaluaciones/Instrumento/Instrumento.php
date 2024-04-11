<?php

namespace App\Http\Livewire\Estudiantes\Evaluaciones\Instrumento;

use Illuminate\Http\Request;
use Livewire\Component;

class Instrumento extends Component
{
    public string $evaluacion_id;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.estudiantes.evaluaciones.instrumento.instrumento');
    }
}
