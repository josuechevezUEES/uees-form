@section('title', 'Tipos Evaluaciones')

@section('content_header')
    {{ Breadcrumbs::render('evaluaciones.tipos.configuraciones', $tipo_evaluacion_id) }}
@stop

<div class="row">
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
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <button class="btn btn-block btn-sm btn-warning">
                            Agregar
                        </button>
                    </div>
                </div>
                <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Facultades</th>
                            <th scope="col">Carreras</th>
                            <th scope="col">Materias</th>
                            <th scope="col">Docentes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Posgrado</td>
                            <td>Maestria En Derecho...</td>
                            <td>
                                Materia 1
                                <br>
                                Materia 2
                            </td>
                            <td>
                                Docente 1
                                <br>
                                Docente 2
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Posgrado</td>
                            <td>Maestria En Derecho...</td>
                            <td>
                                Materia 1
                                <br>
                                Materia 2
                            </td>
                            <td>
                                Docente 1
                                <br>
                                Docente 2
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">1</th>
                            <td>Posgrado</td>
                            <td>Maestria En Derecho...</td>
                            <td>
                                Materia 1
                                <br>
                                Materia 2
                            </td>
                            <td>
                                Docente 1
                                <br>
                                Docente 2
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
