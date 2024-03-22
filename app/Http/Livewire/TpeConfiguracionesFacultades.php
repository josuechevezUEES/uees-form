<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TpeConfiguracionesFacultade;

class TpeConfiguracionesFacultades extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tpe_configuracion_id, $codigo_facultad;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tpeConfiguracionesFacultades.view', [
            'tpeConfiguracionesFacultades' => TpeConfiguracionesFacultade::latest()
						->orWhere('tpe_configuracion_id', 'LIKE', $keyWord)
						->orWhere('codigo_facultad', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->tpe_configuracion_id = null;
		$this->codigo_facultad = null;
    }

    public function store()
    {
        $this->validate([
		'tpe_configuracion_id' => 'required',
		'codigo_facultad' => 'required',
        ]);

        TpeConfiguracionesFacultade::create([ 
			'tpe_configuracion_id' => $this-> tpe_configuracion_id,
			'codigo_facultad' => $this-> codigo_facultad
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'TpeConfiguracionesFacultade Successfully created.');
    }

    public function edit($id)
    {
        $record = TpeConfiguracionesFacultade::findOrFail($id);
        $this->selected_id = $id; 
		$this->tpe_configuracion_id = $record-> tpe_configuracion_id;
		$this->codigo_facultad = $record-> codigo_facultad;
    }

    public function update()
    {
        $this->validate([
		'tpe_configuracion_id' => 'required',
		'codigo_facultad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TpeConfiguracionesFacultade::find($this->selected_id);
            $record->update([ 
			'tpe_configuracion_id' => $this-> tpe_configuracion_id,
			'codigo_facultad' => $this-> codigo_facultad
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'TpeConfiguracionesFacultade Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            TpeConfiguracionesFacultade::where('id', $id)->delete();
        }
    }
}