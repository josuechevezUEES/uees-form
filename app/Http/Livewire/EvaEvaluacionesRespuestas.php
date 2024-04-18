<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EvaEvaluacionesRespuesta;

class EvaEvaluacionesRespuestas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $evaluacion_id, $seccion_id, $pregunta_id, $respuesta, $cif;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.evaEvaluacionesRespuestas.view', [
            'evaEvaluacionesRespuestas' => EvaEvaluacionesRespuesta::latest()
						->orWhere('evaluacion_id', 'LIKE', $keyWord)
						->orWhere('seccion_id', 'LIKE', $keyWord)
						->orWhere('pregunta_id', 'LIKE', $keyWord)
						->orWhere('respuesta', 'LIKE', $keyWord)
						->orWhere('cif', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->evaluacion_id = null;
		$this->seccion_id = null;
		$this->pregunta_id = null;
		$this->respuesta = null;
		$this->cif = null;
    }

    public function store()
    {
        $this->validate([
		'evaluacion_id' => 'required',
		'seccion_id' => 'required',
		'pregunta_id' => 'required',
		'respuesta' => 'required',
		'cif' => 'required',
        ]);

        EvaEvaluacionesRespuesta::create([ 
			'evaluacion_id' => $this-> evaluacion_id,
			'seccion_id' => $this-> seccion_id,
			'pregunta_id' => $this-> pregunta_id,
			'respuesta' => $this-> respuesta,
			'cif' => $this-> cif
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'EvaEvaluacionesRespuesta Successfully created.');
    }

    public function edit($id)
    {
        $record = EvaEvaluacionesRespuesta::findOrFail($id);
        $this->selected_id = $id; 
		$this->evaluacion_id = $record-> evaluacion_id;
		$this->seccion_id = $record-> seccion_id;
		$this->pregunta_id = $record-> pregunta_id;
		$this->respuesta = $record-> respuesta;
		$this->cif = $record-> cif;
    }

    public function update()
    {
        $this->validate([
		'evaluacion_id' => 'required',
		'seccion_id' => 'required',
		'pregunta_id' => 'required',
		'respuesta' => 'required',
		'cif' => 'required',
        ]);

        if ($this->selected_id) {
			$record = EvaEvaluacionesRespuesta::find($this->selected_id);
            $record->update([ 
			'evaluacion_id' => $this-> evaluacion_id,
			'seccion_id' => $this-> seccion_id,
			'pregunta_id' => $this-> pregunta_id,
			'respuesta' => $this-> respuesta,
			'cif' => $this-> cif
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'EvaEvaluacionesRespuesta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            EvaEvaluacionesRespuesta::where('id', $id)->delete();
        }
    }
}