@section('title', $evaluacion->tiposEvaluacione->nombre)

@section('content_header')
    {{ Breadcrumbs::render('estudiantes.evaluaciones.seccion', $evaluacion_id, $seccion_id) }}
@stop

<section class="d-flex justify-content-center">
    <div class="card w-75">
        <div class="card-header px-3 bg-warning">
            <div class="row">
                <div class="col-sm-2 text-center p-3">
                    <img src="{{ asset('img/logo-uees.png') }}" class="img-fluid w-75" alt="Logo-UEES">
                </div>
                <div class="col-sm-10 text-start">
                    <h1 class="widget-user-username font-weight-bold text-left pt-3 text-dark">
                        {{ $evaluacion->tiposEvaluacione->nombre }}
                    </h1>
                    <h5 class="text-dark">
                        La evaluacion se encuentra {{ $evaluacion->estado ? 'Activa' : 'Desactivado' }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <livewire:estudiantes.cuestionario.form-cuestionario :evaluacion_id='$evaluacion->id' :seccion_id='$seccion->id' />
        </div>
    </div>
</section>
