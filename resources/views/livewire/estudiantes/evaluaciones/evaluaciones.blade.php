<div class="row" wire:poll>
    @forelse ($evaluaciones as $evaluacion)
        <div
            class="col-sm-{{ $evaluaciones->count() > 1 ? 12 : 12 }} col-lg-12 col-md-{{ $evaluaciones->count() > 1 ? 6 : 6 }}">
            <div class="card">
                <div class="card-header bg-navy">
                    <strong>
                        {{ $evaluacion->tiposEvaluacione->nombre }}
                    </strong>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Periodo Evaluacion</strong>
                        <br>
                        {{ $evaluacion->fecha_inicio_evaluacion ? date('d-m-Y h:i A', strtotime($evaluacion->fecha_inicio_evaluacion)) : null }}
                        -
                        {{ $evaluacion->fecha_fin_evaluacion ? date('d-m-Y h:i A', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}

                    </p>
                    <p>
                        <strong>Descripcion:</strong>
                        <br>
                        {{ $evaluacion->tiposEvaluacione->descripcion }}
                    </p>
                    @if ($evaluacion->disponible == true)
                        <a href="#{{ $evaluacion->id }}">Completar Evaluacion</a>
                    @else
                        <a href="#{{ $evaluacion->id }}" class="text-danger">
                            No disponible, periodo finalizado
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
