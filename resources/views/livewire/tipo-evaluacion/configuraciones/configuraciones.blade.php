@section('title', $tipo_evaluacion->nombre)

@section('content_header')
    {{ Breadcrumbs::render('evaluaciones.tipos.configuraciones', $tipo_evaluacion_id) }}
@stop

<div class="row">
    <div class="col-sm-12 mb-3">
        <livewire:tipo-evaluacion.configuraciones.entidades.entidades :configuracionId="$configuracion_id" />
    </div>

    <div class="col-sm-12 mb-3 {{ $evaluado_id == '' ? 'd-none' : '' }}">
        @if ($evaluado_id)
            <livewire:tipo-evaluacion.configuraciones.eval-statisfaccion-facultad.facultad :configuracionId="$configuracion_id"
                :wire:key="$configuracion_id" :evaluacionId="$evaluado_id" />
        @else
        @endif
    </div>
</div>
