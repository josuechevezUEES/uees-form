@section('title', __('Tipos Evaluaciones'))
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
                    @include('livewire.tipos-evaluaciones.modals')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tiposEvaluaciones as $row)
                                    <tr class="{{ $deleted_selected_id == $row->id ? 'table-danger' : '' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nombre }}</td>
                                        <td>{{ $row->descripcion }}</td>
                                        <td>{{ $row->estado ? 'Activo' : 'Desactivado' }}</td>
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
                                                            href="{{ route('evaluaciones.tipos.configuraciones', ['tipo_evaluacion_id' => $row->id]) }}">
                                                            <i class="fa fa-wrench"></i>
                                                            Configurar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            onclick="confirm('Confirma la eliminacion de {{ $row->nombre }}?')||event.stopImmediatePropagation()"
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
                                        <td class="text-center" colspan="100%">
                                            Datos no encontrados
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end">{{ $tiposEvaluaciones->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
