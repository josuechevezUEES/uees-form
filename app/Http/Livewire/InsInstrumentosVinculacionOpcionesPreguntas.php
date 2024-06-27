<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosVinculacionOpcionesPregunta;

class InsInstrumentosVinculacionOpcionesPreguntas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $opcion_id, $pregunta_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.insInstrumentosVinculacionOpcionesPreguntas.view', [
            'insInstrumentosVinculacionOpcionesPreguntas' => InsInstrumentosVinculacionOpcionesPregunta::latest()
						->orWhere('opcion_id', 'LIKE', $keyWord)
						->orWhere('pregunta_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->opcion_id = null;
		$this->pregunta_id = null;
    }

    public function store()
    {
        $this->validate([
		'opcion_id' => 'required',
		'pregunta_id' => 'required',
        ]);

        InsInstrumentosVinculacionOpcionesPregunta::create([ 
			'opcion_id' => $this-> opcion_id,
			'pregunta_id' => $this-> pregunta_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'InsInstrumentosVinculacionOpcionesPregunta Successfully created.');
    }

    public function edit($id)
    {
        $record = InsInstrumentosVinculacionOpcionesPregunta::findOrFail($id);
        $this->selected_id = $id; 
		$this->opcion_id = $record-> opcion_id;
		$this->pregunta_id = $record-> pregunta_id;
    }

    public function update()
    {
        $this->validate([
		'opcion_id' => 'required',
		'pregunta_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = InsInstrumentosVinculacionOpcionesPregunta::find($this->selected_id);
            $record->update([ 
			'opcion_id' => $this-> opcion_id,
			'pregunta_id' => $this-> pregunta_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'InsInstrumentosVinculacionOpcionesPregunta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosVinculacionOpcionesPregunta::where('id', $id)->delete();
        }
    }
}