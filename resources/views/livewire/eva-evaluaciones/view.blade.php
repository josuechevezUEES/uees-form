@section('title', __('Eva Evaluaciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-navy">
                    <div class="row">
                        <div class="col-sm-10">
                            <input wire:model='keyWord' type="text" class="form-control" name="search"
                                id="search" placeholder="Buscar registro">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#createDataModal">
                                <i class="fa fa-plus"></i> 
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.eva-evaluaciones.modals')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Configuracion</th>
                                    <th>Instrumento</th>
                                    <th>Periodo Inicio</th>
                                    <th>Periodo Fin</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($evaEvaluaciones as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->tiposEvaluacione->nombre }}</td>
                                        <td>{{ $row->insInstrumentosEvaluacione->nombre }}</td>
                                        <td>{{ $row->fecha_inicio_evaluacion ? date('d-m-Y h:i A', strtotime($row->fecha_inicio_evaluacion)) : null }}</td>
                                        <td>{{ $row->fecha_fin_evaluacion ? date('d-m-Y h:i A', strtotime($row->fecha_fin_evaluacion)) : null }}</td>
                                        <td>{{ $row->estado ? 'Activo' : 'Desactivado' }}</td>
                                        <td width="90">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-warning dropdown-toggle" href="#"
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
                                        <td class="text-center" colspan="100%">No data Found </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-end">{{ $evaEvaluaciones->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
