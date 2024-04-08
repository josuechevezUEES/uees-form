<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosOpcione;

class InsInstrumentosOpciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $pregunta_id, $nombre, $entrada;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.insInstrumentosOpciones.view', [
            'insInstrumentosOpciones' => InsInstrumentosOpcione::latest()
						->orWhere('pregunta_id', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('entrada', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->pregunta_id = null;
		$this->nombre = null;
		$this->entrada = null;
    }

    public function store()
    {
        $this->validate([
		'pregunta_id' => 'required',
		'nombre' => 'required',
		'entrada' => 'required',
        ]);

        InsInstrumentosOpcione::create([ 
			'pregunta_id' => $this-> pregunta_id,
			'nombre' => $this-> nombre,
			'entrada' => $this-> entrada
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'InsInstrumentosOpcione Successfully created.');
    }

    public function edit($id)
    {
        $record = InsInstrumentosOpcione::findOrFail($id);
        $this->selected_id = $id; 
		$this->pregunta_id = $record-> pregunta_id;
		$this->nombre = $record-> nombre;
		$this->entrada = $record-> entrada;
    }

    public function update()
    {
        $this->validate([
		'pregunta_id' => 'required',
		'nombre' => 'required',
		'entrada' => 'required',
        ]);

        if ($this->selected_id) {
			$record = InsInstrumentosOpcione::find($this->selected_id);
            $record->update([ 
			'pregunta_id' => $this-> pregunta_id,
			'nombre' => $this-> nombre,
			'entrada' => $this-> entrada
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'InsInstrumentosOpcione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosOpcione::where('id', $id)->delete();
        }
    }
}