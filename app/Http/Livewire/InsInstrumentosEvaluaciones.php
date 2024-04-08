<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosEvaluacione;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class InsInstrumentosEvaluaciones extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion, $estado;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.ins-instrumentos-evaluaciones.view', [
            'insInstrumentosEvaluaciones' => InsInstrumentosEvaluacione::latest()
                ->orWhere('nombre', 'LIKE', $keyWord)
                ->orWhere('descripcion', 'LIKE', $keyWord)
                ->orWhere('estado', 'LIKE', $keyWord)
                ->cursorPaginate(10),
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
            'estado' => 'required',
        ]);

        InsInstrumentosEvaluacione::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        return $this->alert('success','Instrumento Creado');
    }

    public function edit($id)
    {
        $record = InsInstrumentosEvaluacione::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre = $record->nombre;
        $this->descripcion = $record->descripcion;
        $this->estado = $record->estado;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'estado' => 'required',
        ]);

        if ($this->selected_id) {
            $record = InsInstrumentosEvaluacione::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            return $this->alert('success','Instrumento Actualizado');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosEvaluacione::where('id', $id)
                ->update([
                    'estado' => 0
                ]);
        }
    }
}
