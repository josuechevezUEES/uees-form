@section('title', __('Eva Evaluaciones'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fab fa-laravel text-info"></i>
                                Eva Evaluacione Listing </h4>
                        </div>
                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search"
                                id="search" placeholder="Search Eva Evaluaciones">
                        </div>
                        <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                            <i class="fa fa-plus"></i> Add Eva Evaluaciones
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
                                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                                            class="dropdown-item"
                                                            wire:click="edit({{ $row->id }})"><i
                                                                class="fa fa-edit"></i> Edit </a></li>
                                                    <li><a class="dropdown-item"
                                                            onclick="confirm('Confirm Delete Eva Evaluacione id {{ $row->id }}? \nDeleted Eva Evaluaciones cannot be recovered!')||event.stopImmediatePropagation()"
                                                            wire:click="destroy({{ $row->id }})"><i
                                                                class="fa fa-trash"></i> Delete </a></li>
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
