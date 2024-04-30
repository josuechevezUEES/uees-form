<div class="mb-4">
    <h3>
        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
        {{ $pregunta->nombre }}
    </h3>

    @if (isset($pregunta->opciones))
        <div class="row pt-3" wire:ignore>
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-auto mb-3">
                        <input type="{{ $opcion['entrada'] }}" name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                            id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                            wire:model="opcion" {{ $pregunta->requerido ? 'required' : null }}
                            value="{{ $opcion['nombre'] }}" class="form-radio-input">
                        <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                            {{ $opcion['nombre'] }}
                        </label>
                    </div>
                @else
                    <div class="col-sm-auto ml-md-3 mb-3">
                        <input type="{{ $opcion['entrada'] }}"
                            name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                            id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                            wire:model="opcion" {{ $pregunta->requerido ? 'required' : null }}
                            value="{{ $opcion['nombre'] }}" class="form-radio-input">
                        <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                            {{ $opcion['nombre'] }}
                        </label>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    @endif

    @if ($mostrar_comentario)
        <div class="col-sm-12">
            <div class="form-group pt-3">
                <strong>
                    {{ $pregunta->comentario->comentario }}
                </strong>
                <input type="text" class="form-control form-control-border" wire:model="comentario"
                    {{ $pregunta->requerido ? 'required' : null }}>
            </div>
        </div>
    @endif
</div>
