<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TiposEvaluadore;

class TiposEvaluadores extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $estado;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.tipos-evaluadores.view', [
            'tiposEvaluadores' => TiposEvaluadore::latest()
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

        TiposEvaluadore::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'TiposEvaluadore Successfully created.');
    }

    public function edit($id)
    {
        $record = TiposEvaluadore::findOrFail($id);
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
            $record = TiposEvaluadore::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'TiposEvaluadore Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            TiposEvaluadore::where('id', $id)->delete();
        }
    }
}
