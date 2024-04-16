<?php

namespace App\Http\Livewire;

use App\Models\ModelHasRole;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UsuarioClass;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email;
    public $buscar_usuario_class, $usuario_class;

    public $roles = [], $usuario_id, $roles_seleccionados = [];
    public $departamento;
    public $departamento_nombre;
    public $facultad_id;
    public $facultad_nombre;
    public $carrera_id;
    public $carrera_nombre;
    public $cif;
    public $dui;
    public $estado;
    public $modalidad;

    protected $listeners = [
        'agregar_rol' => 'agregar_rol',
        'eliminar_rol' => 'eliminar_rol',
    ];

    public function agregar_rol($rol)
    {
        if ($rol) :
            $buscar_relacion = ModelHasRole::where([
                'role_id' => $rol,
                'model_type' => 'App\Models\User',
                'model_id' => $this->selected_id
            ]);

            if ($buscar_relacion->count() == 0) :
                ModelHasRole::insert([
                    'role_id' => $rol,
                    'model_type' => 'App\Models\User',
                    'model_id' => $this->selected_id
                ]);
            endif;
        endif;
        $this->alert('success','Rol Agregado');
    }

    public function eliminar_rol($rol)
    {
        if ($rol) :
            ModelHasRole::where([
                'role_id' => $rol,
                'model_type' => 'App\Models\User',
                'model_id' => $this->selected_id
            ])
                ->delete();
        endif;

        $this->alert('success','Rol Eliminado');
    }

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function updatedBuscarUsuarioClass($value)
    {
        $this->resetInput();

        if ($value) :
            $buscar_usuario_class = UsuarioClass::select('USRUID', 'USREML', 'USRDPT', 'USRDSC', 'USRCIF')
                ->orWhere('USRUID', $value)
                ->orWhere('USRCIF', $value)
                ->get();

            if ($buscar_usuario_class->count() > 0) :

                $usuario_class = $buscar_usuario_class->first();

                $departamento = $usuario_class->ejecutarSP($usuario_class->USRCIF);

                $this->usuario_class = $usuario_class;
                $this->name = $this->usuario_class->USRUID;
                $this->email = $this->usuario_class->USREML;

                if ($departamento != null) :
                    $this->departamento = $departamento[0]->IDUNIDAD;
                    $this->departamento_nombre = $departamento[0]->UNIDAD;
                endif;
            endif;
        endif;
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.users.view', [
            'users' => User::latest()
                ->orWhere('name', 'LIKE', $keyWord)
                ->orWhere('email', 'LIKE', $keyWord)
                ->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->departamento = null;
        $this->departamento_nombre = null;
        $this->facultad_id = null;
        $this->facultad_nombre = null;
        $this->carrera_id = null;
        $this->carrera_nombre = null;
        $this->cif = null;
        $this->dui = null;
        $this->estado = null;
        $this->modalidad = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        User::insert([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;

        $this->roles_seleccionados = $record
            ->roles
            ->pluck('id');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($this->selected_id) {
            $record = User::find($this->selected_id);

            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'User Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            User::where('id', $id)->delete();
        }
    }
}
