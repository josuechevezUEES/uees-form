<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EvaEvaluacionesRespuesta;

class EvaEvaluacionesRespuestas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $usuario_id, $evaluacion_id, $seccion_id, $pregunta_id, $opcion_id, $comentario;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.evaEvaluacionesRespuestas.view', [
            'evaEvaluacionesRespuestas' => EvaEvaluacionesRespuesta::latest()
						->orWhere('usuario_id', 'LIKE', $keyWord)
						->orWhere('evaluacion_id', 'LIKE', $keyWord)
						->orWhere('seccion_id', 'LIKE', $keyWord)
						->orWhere('pregunta_id', 'LIKE', $keyWord)
						->orWhere('opcion_id', 'LIKE', $keyWord)
						->orWhere('comentario', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->usuario_id = null;
		$this->evaluacion_id = null;
		$this->seccion_id = null;
		$this->pregunta_id = null;
		$this->opcion_id = null;
		$this->comentario = null;
    }

    public function store()
    {
        $this->validate([
		'usuario_id' => 'required',
		'evaluacion_id' => 'required',
		'seccion_id' => 'required',
		'pregunta_id' => 'required',
		'opcion_id' => 'required',
        ]);

        EvaEvaluacionesRespuesta::create([ 
			'usuario_id' => $this-> usuario_id,
			'evaluacion_id' => $this-> evaluacion_id,
			'seccion_id' => $this-> seccion_id,
			'pregunta_id' => $this-> pregunta_id,
			'opcion_id' => $this-> opcion_id,
			'comentario' => $this-> comentario
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'EvaEvaluacionesRespuesta Successfully created.');
    }

    public function edit($id)
    {
        $record = EvaEvaluacionesRespuesta::findOrFail($id);
        $this->selected_id = $id; 
		$this->usuario_id = $record-> usuario_id;
		$this->evaluacion_id = $record-> evaluacion_id;
		$this->seccion_id = $record-> seccion_id;
		$this->pregunta_id = $record-> pregunta_id;
		$this->opcion_id = $record-> opcion_id;
		$this->comentario = $record-> comentario;
    }

    public function update()
    {
        $this->validate([
		'usuario_id' => 'required',
		'evaluacion_id' => 'required',
		'seccion_id' => 'required',
		'pregunta_id' => 'required',
		'opcion_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = EvaEvaluacionesRespuesta::find($this->selected_id);
            $record->update([ 
			'usuario_id' => $this-> usuario_id,
			'evaluacion_id' => $this-> evaluacion_id,
			'seccion_id' => $this-> seccion_id,
			'pregunta_id' => $this-> pregunta_id,
			'opcion_id' => $this-> opcion_id,
			'comentario' => $this-> comentario
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