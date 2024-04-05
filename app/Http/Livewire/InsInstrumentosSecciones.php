<?php

namespace App\Http\Livewire;

use App\Models\InsInstrumentosEvaluacione;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosSeccione;
use Illuminate\Http\Request;

class InsInstrumentosSecciones extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $instrumento_id, $nombre, $literal, $fondo_img, $estado;
    public InsInstrumentosEvaluacione $instrumento;

    public function mount(Request $request)
    {
        $this->instrumento_id = $request->instrumento_id;
        $this->instrumento = InsInstrumentosEvaluacione::find($request->instrumento_id);
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.ins-instrumentos-secciones.view', [
            'insInstrumentosSecciones' => InsInstrumentosSeccione::orderBy('id','ASC')
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

        InsInstrumentosSeccione::create([
            'instrumento_id' => $this->instrumento_id,
            'nombre'         => $this->nombre,
            'literal'        => $this->literal,
            'fondo_img'      => $this->fondo_img,
            'estado'         => $this->estado
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'InsInstrumentosSeccione Successfully created.');
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
            'estado' => 'required',
        ]);

        if ($this->selected_id) {
            $record = InsInstrumentosSeccione::find($this->selected_id);
            $record->update([
                'instrumento_id' => $this->instrumento_id,
                'nombre' => $this->nombre,
                'literal' => $this->literal,
                'fondo_img' => $this->fondo_img,
                'estado' => $this->estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'InsInstrumentosSeccione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosSeccione::where('id', $id)->delete();
        }
    }
}
