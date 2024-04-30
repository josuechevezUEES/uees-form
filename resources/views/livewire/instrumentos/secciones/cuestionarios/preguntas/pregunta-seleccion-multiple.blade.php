<div class="mb-4">
    <h3>
        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
        {{ $pregunta->nombre }}
    </h3>
    @if (isset($pregunta->opciones))
        <div class="row pt-3">
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-auto">
                        <div class="form-group form-check">
                            <input type="{{ $opcion['entrada'] }}" class="form-check-input"
                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                wire:model="opciones_seleccionada" 
                                value="{{ $opcion['nombre'] }}"
                                {{ $pregunta->requerido ? 'required' : null }}
                                id="check{{ $opcion['nombre'] }}">
                            <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                {{ $opcion['nombre'] }}
                            </label>
                        </div>
                    </div>
                @else
                    <div class="col-sm-auto ml-md-3">
                        <div class="form-group form-check">
                            <input type="{{ $opcion['entrada'] }}" class="form-check-input"
                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                wire:model="opciones_seleccionada"
                                value="{{ $opcion['nombre'] }}" 
                                {{ $pregunta->requerido ? 'required' : null }}
                                id="check{{ $opcion['nombre'] }}">
                            <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                {{ $opcion['nombre'] }}
                            </label>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    @endif
</div>
