<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TiposEvaluacione;

class TiposEvaluaciones extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $estado;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.tipos-evaluaciones.view', [
            'tiposEvaluaciones' => TiposEvaluacione::latest()
                ->orWhere('nombre', 'LIKE', $keyWord)
                ->orWhere('descripcion', 'LIKE', $keyWord)
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
        session()->flash('message', 'TiposEvaluacione Successfully created.');
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
            session()->flash('message', 'TiposEvaluacione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            TiposEvaluacione::where('id', $id)->delete();
        }
    }
}
