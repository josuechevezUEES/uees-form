@section('title', $tipo_evaluacion->nombre)

@section('content_header')
    {{ Breadcrumbs::render('evaluaciones.tipos.configuraciones', $tipo_evaluacion_id) }}
@stop

<div class="row">
    <div class="col-sm-12 mb-3">
        <livewire:tipo-evaluacion.configuraciones.entidades.entidades :configuracionId="$configuracion_id"/>
    </div>

    <div class="col-sm-12 mb-3">
        @if ($evaluado_id)
            <livewire:tipo-evaluacion.configuraciones.eval-statisfaccion-facultad.facultad :configuracionId="$configuracion_id" />
        @endif
    </div>
</div>
