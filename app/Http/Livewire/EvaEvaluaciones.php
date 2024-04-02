<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EvaEvaluacione;

class EvaEvaluaciones extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_evaluacion_id, $instrumento_id, $fecha_inicio_evaluacion, $fecha_fin_evaluacion, $estado;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.eva-evaluaciones.view', [
            'evaEvaluaciones' => EvaEvaluacione::latest()
                ->orWhere('tipo_evaluacion_id', 'LIKE', $keyWord)
                ->orWhere('instrumento_id', 'LIKE', $keyWord)
                ->orWhere('fecha_inicio_evaluacion', 'LIKE', $keyWord)
                ->orWhere('fecha_fin_evaluacion', 'LIKE', $keyWord)
                ->orWhere('estado', 'LIKE', $keyWord)
                ->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->tipo_evaluacion_id = null;
        $this->instrumento_id = null;
        $this->fecha_inicio_evaluacion = null;
        $this->fecha_fin_evaluacion = null;
        $this->estado = null;
    }

    public function store()
    {
        $this->validate([
            'tipo_evaluacion_id' => 'required',
            'instrumento_id' => 'required',
            'fecha_inicio_evaluacion' => 'required',
            'fecha_fin_evaluacion' => 'required',
            'estado' => 'required',
        ]);

        EvaEvaluacione::create([
            'tipo_evaluacion_id' => $this->tipo_evaluacion_id,
            'instrumento_id' => $this->instrumento_id,
            'fecha_inicio_evaluacion' => $this->fecha_inicio_evaluacion,
            'fecha_fin_evaluacion' => $this->fecha_fin_evaluacion,
            'estado' => $this->estado
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'EvaEvaluacione Successfully created.');
    }

    public function edit($id)
    {
        $record = EvaEvaluacione::findOrFail($id);
        $this->selected_id = $id;
        $this->tipo_evaluacion_id = $record->tipo_evaluacion_id;
        $this->instrumento_id = $record->instrumento_id;
        $this->fecha_inicio_evaluacion = $record->fecha_inicio_evaluacion;
        $this->fecha_fin_evaluacion = $record->fecha_fin_evaluacion;
        $this->estado = $record->estado;
    }

    public function update()
    {
        $this->validate([
            'tipo_evaluacion_id' => 'required',
            'instrumento_id' => 'required',
            'fecha_inicio_evaluacion' => 'required',
            'fecha_fin_evaluacion' => 'required',
            'estado' => 'required',
        ]);

        if ($this->selected_id) {
            $record = EvaEvaluacione::find($this->selected_id);
            $record->update([
                'tipo_evaluacion_id' => $this->tipo_evaluacion_id,
                'instrumento_id' => $this->instrumento_id,
                'fecha_inicio_evaluacion' => $this->fecha_inicio_evaluacion,
                'fecha_fin_evaluacion' => $this->fecha_fin_evaluacion,
                'estado' => $this->estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'EvaEvaluacione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            EvaEvaluacione::where('id', $id)->delete();
        }
    }
}
