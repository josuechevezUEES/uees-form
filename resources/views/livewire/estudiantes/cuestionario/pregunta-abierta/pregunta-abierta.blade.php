<div class="mb-4">
    <h3>
        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
        {{ $pregunta->nombre }}
        @if ($pregunta->requerido)
            <span class="text-danger">*</span>
        @endif
    </h3>
    <div class="row pt-3">
        @if (isset($pregunta->opciones))
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-auto">
                        <div class="form-group form-check">
                            <input type="{{ $opcion['entrada'] }}" class="form-check-input" value="{{ $opcion['nombre'] }}"
                                name="pregunta-{{ $pregunta->id }}" id="pregunta-{{ $pregunta->id }}">
                            <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                {{ $opcion['nombre'] }}
                            </label>
                        </div>
                    </div>
                @else
                    <div class="col-sm-auto ml-md-3">
                        <div class="form-group form-check">
                            <input type="{{ $opcion['entrada'] }}" class="form-check-input"
                                value="{{ $opcion['nombre'] }}" name="pregunta-{{ $pregunta->id }}"
                                id="pregunta-{{ $pregunta->id }}">
                            <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                {{ $opcion['nombre'] }}
                            </label>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        @endif
    </div>
</div>
