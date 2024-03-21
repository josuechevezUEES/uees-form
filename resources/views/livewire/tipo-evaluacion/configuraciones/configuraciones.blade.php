@section('title', $tipo_evaluacion->nombre)

@section('content_header')
    {{ Breadcrumbs::render('evaluaciones.tipos.configuraciones', $tipo_evaluacion_id) }}
@stop

<div class="row">
    <div class="col-sm-12 mb-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-header bg-navy">
                        Evaluadores
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="evaluador_id">¿Quienes seran los evaluadores?</label>
                            <select id="evaluador_id" wire:model='evaluador_id' class="form-control">
                                <option>--seleccionar--</option>
                                @forelse ($evaluadores as $evaluador)
                                    <option value="{{ $evaluador->id }}">{{ $evaluador->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-header bg-navy">
                        Evaluados
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="evaluado_id">¿Quienes seran los evaluados?</label>
                            <select id="evaluado_id" wire:model='evaluado_id' class="form-control"
                                wire:target="evaluador_id" wire:loading.attr="disabled">
                                <option>--seleccionar--</option>
                                @forelse ($evaluados as $evaluado)
                                    <option value="{{ $evaluado->id }}">{{ $evaluado->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 mb-3">
        @switch($evaluado_id)
            @case('3')
                <livewire:tipo-evaluacion.configuraciones.eval-statisfaccion-facultad.facultad>
                @break
            @default

        @endswitch
    </div>
</div>
