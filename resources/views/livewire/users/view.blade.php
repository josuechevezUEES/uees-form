@section('title', __('Users'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-navy">
                    <div class="row">
                        <div class="col-sm-10">
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar">
                            <div wire:loading wire:loading.delay wire:target='keyWord'>
                                <div class="mt-2">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Buscando, porfavor espere...
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="btn btn-block btn-warning" data-bs-toggle="modal"
                                data-bs-target="#createDataModal">
                                <i class="fa fa-plus"></i>
                                Agregar
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.users.modals')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td width="90">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Acciones
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                                            class="dropdown-item"
                                                            wire:click="edit({{ $row->id }})">
                                                            <i class="fa fa-edit"></i>
                                                            Editar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            onclick="confirm('Confirma la eliminacion de {{ $row->name }}?')||event.stopImmediatePropagation()"
                                                            wire:click="destroy({{ $row->id }})">
                                                            <i class="fa fa-trash"></i>
                                                            Eliminar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">No data Found </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end">{{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
