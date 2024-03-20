<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TiposEvaluacione;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TiposEvaluaciones extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $estado;
    public $deleted_selected_id;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.tipos-evaluaciones.view', [
            'tiposEvaluaciones' => TiposEvaluacione::latest()
                ->where(function ($query) use ($keyWord) {
                    $query->orWhere('nombre', 'LIKE', $keyWord)
                        ->orWhere('descripcion', 'LIKE', $keyWord);
                })
                ->where('estado', 1)
                ->cursorPaginate(15),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->nombre = null;
        $this->descripcion = null;
        $this->estado = null;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        TiposEvaluacione::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->alert('success', 'Evaluacion Creada');
    }

    public function edit($id)
    {
        $record = TiposEvaluacione::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre = $record->nombre;
        $this->descripcion = $record->descripcion;
        $this->estado = $record->estado;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        if ($this->selected_id) {
            $record = TiposEvaluacione::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            $this->alert('success', 'Evaluacion Actualizada');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $this->deleted_selected_id = $id;

            TiposEvaluacione::where('id', $id)
                ->update([
                    'estado' => 0
                ]);

            $this->alert('success', 'Evaluacion Eliminada');

            $this->deleted_selected_id = null;
        }
    }
}
