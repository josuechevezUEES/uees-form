<?php

namespace App\Http\Livewire;

use App\Models\InsInstrumentosEvaluacione;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosSeccione;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class InsInstrumentosSecciones extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $instrumento_id, $nombre, $literal, $fondo_img, $estado;
    public InsInstrumentosEvaluacione $instrumento;
    public $fondo;

    public function mount(Request $request)
    {
        $this->instrumento_id = $request->instrumento_id;
        $this->instrumento = InsInstrumentosEvaluacione::find($request->instrumento_id);
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.ins-instrumentos-secciones.view', [
            'insInstrumentosSecciones' => InsInstrumentosSeccione::orderBy('id', 'ASC')
                ->orWhere('instrumento_id', 'LIKE', $keyWord)
                ->orWhere('nombre', 'LIKE', $keyWord)
                ->orWhere('literal', 'LIKE', $keyWord)
                ->orWhere('fondo_img', 'LIKE', $keyWord)
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
        // $this->instrumento_id = null;
        $this->nombre = null;
        $this->literal = null;
        $this->fondo_img = null;
        $this->estado = null;
    }

    public function store()
    {
        $this->validate([
            'instrumento_id' => 'required',
            'nombre' => 'required',
            'literal' => 'required',
            'estado' => 'required',
        ]);

        $this->fondo_img->store('photos');

        InsInstrumentosSeccione::create([
            'instrumento_id' => $this->instrumento_id,
            'nombre'         => $this->nombre,
            'literal'        => $this->literal,
            'fondo_img'      => $this->fondo_img,
            'estado'         => $this->estado
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->alert('success', 'Seccion Registrada Correctamente');
    }

    public function edit($id)
    {
        $record = InsInstrumentosSeccione::findOrFail($id);
        $this->selected_id = $id;
        $this->instrumento_id = $record->instrumento_id;
        $this->nombre = $record->nombre;
        $this->literal = $record->literal;
        $this->fondo_img = $record->fondo_img;
        $this->estado = $record->estado;
    }

    public function update()
    {
        $this->validate([
            'instrumento_id' => 'required',
            'nombre' => 'required',
            'literal' => 'required',
            'fondo_img' => 'required', // 1MB Max
            'estado' => 'required',
        ]);

        if ($this->selected_id) {
            $record = InsInstrumentosSeccione::find($this->selected_id);

            $record->update([
                'instrumento_id' => $this->instrumento_id,
                'nombre' => $this->nombre,
                'literal' => $this->literal,
                'fondo_img' => $this->fondo->hashName(),
                'estado' => $this->estado
            ]);

            $this->fondo_img->storePublicly('fondo_img', 'public');

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            $this->alert('success', "$record->nombre fue actualizado");
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $seccion = InsInstrumentosSeccione::where('id', $id)->first();

            $seccion_nombre = $seccion->nombre;

            $seccion->delete();

            $this->alert('success', "$seccion_nombre fue eliminado");
        }
    }
}
