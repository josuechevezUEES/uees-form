<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InsInstrumentosPregunta;

class InsInstrumentosPreguntas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cuestionario_id, $tipo_pregunta_id, $sub_numeral, $requerido;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.insInstrumentosPreguntas.view', [
            'insInstrumentosPreguntas' => InsInstrumentosPregunta::latest()
						->orWhere('cuestionario_id', 'LIKE', $keyWord)
						->orWhere('tipo_pregunta_id', 'LIKE', $keyWord)
						->orWhere('sub_numeral', 'LIKE', $keyWord)
						->orWhere('requerido', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->cuestionario_id = null;
		$this->tipo_pregunta_id = null;
		$this->sub_numeral = null;
		$this->requerido = null;
    }

    public function store()
    {
        $this->validate([
		'cuestionario_id' => 'required',
		'tipo_pregunta_id' => 'required',
		'sub_numeral' => 'required',
		'requerido' => 'required',
        ]);

        InsInstrumentosPregunta::create([ 
			'cuestionario_id' => $this-> cuestionario_id,
			'tipo_pregunta_id' => $this-> tipo_pregunta_id,
			'sub_numeral' => $this-> sub_numeral,
			'requerido' => $this-> requerido
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'InsInstrumentosPregunta Successfully created.');
    }

    public function edit($id)
    {
        $record = InsInstrumentosPregunta::findOrFail($id);
        $this->selected_id = $id; 
		$this->cuestionario_id = $record-> cuestionario_id;
		$this->tipo_pregunta_id = $record-> tipo_pregunta_id;
		$this->sub_numeral = $record-> sub_numeral;
		$this->requerido = $record-> requerido;
    }

    public function update()
    {
        $this->validate([
		'cuestionario_id' => 'required',
		'tipo_pregunta_id' => 'required',
		'sub_numeral' => 'required',
		'requerido' => 'required',
        ]);

        if ($this->selected_id) {
			$record = InsInstrumentosPregunta::find($this->selected_id);
            $record->update([ 
			'cuestionario_id' => $this-> cuestionario_id,
			'tipo_pregunta_id' => $this-> tipo_pregunta_id,
			'sub_numeral' => $this-> sub_numeral,
			'requerido' => $this-> requerido
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'InsInstrumentosPregunta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            InsInstrumentosPregunta::where('id', $id)->delete();
        }
    }
}