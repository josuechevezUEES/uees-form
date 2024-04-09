<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosComentario;

class InsInstrumentosComentarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $pregunta_id, $comentario, $entrada;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.insInstrumentosComentarios.view', [
            'insInstrumentosComentarios' => InsInstrumentosComentario::latest()
						->orWhere('pregunta_id', 'LIKE', $keyWord)
						->orWhere('comentario', 'LIKE', $keyWord)
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
		$this->comentario = null;
		$this->entrada = null;
    }

    public function store()
    {
        $this->validate([
		'pregunta_id' => 'required',
		'comentario' => 'required',
        ]);

        InsInstrumentosComentario::create([ 
			'pregunta_id' => $this-> pregunta_id,
			'comentario' => $this-> comentario,
			'entrada' => $this-> entrada
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'InsInstrumentosComentario Successfully created.');
    }

    public function edit($id)
    {
        $record = InsInstrumentosComentario::findOrFail($id);
        $this->selected_id = $id; 
		$this->pregunta_id = $record-> pregunta_id;
		$this->comentario = $record-> comentario;
		$this->entrada = $record-> entrada;
    }

    public function update()
    {
        $this->validate([
		'pregunta_id' => 'required',
		'comentario' => 'required',
        ]);

        if ($this->selected_id) {
			$record = InsInstrumentosComentario::find($this->selected_id);
            $record->update([ 
			'pregunta_id' => $this-> pregunta_id,
			'comentario' => $this-> comentario,
			'entrada' => $this-> entrada
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'InsInstrumentosComentario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosComentario::where('id', $id)->delete();
        }
    }
}