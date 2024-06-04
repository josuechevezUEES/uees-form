@section('title', $evaluacion->tiposEvaluacione->nombre)

<section class="d-flex justify-content-center">
    <div class="card w-75">
        <div class="card-header px-3 bg-warning">
            <div class="row">
                <div class="col-sm-2 pt-3">
                    <img src="{{ asset('/img/logo-uees.png') }}" alt="logo-uees" class="w-75 img-fluid">
                </div>
                <div class="col-sm-10 pt-4">
                    <h1 class="font-weight-bolder text-dark-blue">
                        <strong>
                            Universidad Evangelica de El Salvador
                        </strong>
                    </h1>
                    <h4 class="font-weight-normal text-dark-blue">
                        <strong>
                            {{ $evaluacion->tiposEvaluacione->nombre }}
                            {{ $evaluacion->fecha_fin_evaluacion ? date('Y', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}
                        </strong>
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <livewire:estudiantes.cuestionario.form-cuestionario :evaluacion_id='$evaluacion->id' :seccion_id='$seccion->id' />
            </form>
        </div>
    </div>
</section>
