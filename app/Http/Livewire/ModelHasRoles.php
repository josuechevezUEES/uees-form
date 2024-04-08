<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ModelHasRole;

class ModelHasRoles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $role_id, $model_type, $model_id;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.modelHasRoles.view', [
            'modelHasRoles' => ModelHasRole::latest()
                ->orWhere('role_id', 'LIKE', $keyWord)
                ->orWhere('model_type', 'LIKE', $keyWord)
                ->orWhere('model_id', 'LIKE', $keyWord)
                ->cursorPaginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->role_id = null;
        $this->model_type = null;
        $this->model_id = null;
    }

    public function store()
    {
        $this->validate([
            'role_id' => 'required',
            'model_type' => 'required',
            'model_id' => 'required',
        ]);

        ModelHasRole::create([
            'role_id' => $this->role_id,
            'model_type' => $this->model_type,
            'model_id' => $this->model_id
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'ModelHasRole Successfully created.');
    }

    public function edit($id)
    {
        $record = ModelHasRole::findOrFail($id);
        $this->selected_id = $id;
        $this->role_id = $record->role_id;
        $this->model_type = $record->model_type;
        $this->model_id = $record->model_id;
    }

    public function update()
    {
        $this->validate([
            'role_id' => 'required',
            'model_type' => 'required',
            'model_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = ModelHasRole::find($this->selected_id);
            $record->update([
                'role_id' => $this->role_id,
                'model_type' => $this->model_type,
                'model_id' => $this->model_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'ModelHasRole Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            ModelHasRole::where('id', $id)->delete();
        }
    }
}
