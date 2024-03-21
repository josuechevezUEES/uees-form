@section('title', $tipo_evaluacion->nombre)

@section('content_header')
    {{ Breadcrumbs::render('evaluaciones.tipos.configuraciones', $tipo_evaluacion_id) }}
@stop

<div class="row" wire:poll>
    <div class="col-sm-12 mb-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="evaluador_seleccionado">¿Quienes seran los evaluadores?</label>
                            <select class="form-control" id="evaluador_seleccionado">
                                <option>--seleccionar--</option>
                                <option>Docente</option>
                                <option>Estudiantes</option>
                                <option value="">Coordinadores</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="evaluado_seleccionado">¿Quienes seran los evaluados?</label>
                            <select class="form-control" id="evaluado_seleccionado">
                                <option>--seleccionar--</option>
                                <option>Docentes</option>
                                <option>Estudiantes</option>
                                <option>Servicios</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-navy">
                <h5 class="card-title">
                    Facultades Configuradas
                </h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <div class="card-body bg-light">

            </div>
        </div>
    </div>
</div>
