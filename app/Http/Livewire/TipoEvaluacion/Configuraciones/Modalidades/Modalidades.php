<?php

namespace App\Http\Livewire\TipoEvaluacion\Configuraciones\Modalidades;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Modalidades extends Component
{
    use LivewireAlert;
    use WithPagination;

    public string $configuracion_id;

    public function render()
    {
        return view('livewire.tipo-evaluacion.configuraciones.modalidades.modalidades');
    }
}
