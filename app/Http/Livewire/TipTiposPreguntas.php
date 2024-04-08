<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipTiposPregunta;

class TipTiposPreguntas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $entrada, $comentario, $estado;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipTiposPreguntas.view', [
            'tipTiposPreguntas' => TipTiposPregunta::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('entrada', 'LIKE', $keyWord)
						->orWhere('comentario', 'LIKE', $keyWord)
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
		$this->entrada = null;
		$this->comentario = null;
		$this->estado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'entrada' => 'required',
		'comentario' => 'required',
		'estado' => 'required',
        ]);

        TipTiposPregunta::create([ 
			'nombre' => $this-> nombre,
			'entrada' => $this-> entrada,
			'comentario' => $this-> comentario,
			'estado' => $this-> estado
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'TipTiposPregunta Successfully created.');
    }

    public function edit($id)
    {
        $record = TipTiposPregunta::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->entrada = $record-> entrada;
		$this->comentario = $record-> comentario;
		$this->estado = $record-> estado;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'entrada' => 'required',
		'comentario' => 'required',
		'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TipTiposPregunta::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'entrada' => $this-> entrada,
			'comentario' => $this-> comentario,
			'estado' => $this-> estado
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'TipTiposPregunta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            TipTiposPregunta::where('id', $id)->delete();
        }
    }
}