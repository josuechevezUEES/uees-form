<div class="mb-4">

    <h3>
        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
        {{ $pregunta->nombre }}
    </h3>

    <div class="row pt-3">
        @if (isset($pregunta->opciones))
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-auto">
                        <input type="{{ $opcion['entrada'] }}" name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                            id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                            {{ $pregunta->requerido ? 'required' : null }} class="form-radio-input">
                        <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                            {{ $opcion['nombre'] }}
                        </label>

                    </div>
                @else
                    <div class="col-sm-auto ml-md-3">
                        <input type="{{ $opcion['entrada'] }}"
                            name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                            id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                            {{ $pregunta->requerido ? 'required' : null }} class="form-radio-input">
                        <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                            {{ $opcion['nombre'] }}
                        </label>
                    </div>
                @endif

            @empty
                <div class="col-sm-12">
                    <p class="text-muted">
                        Opciones No Encontradas
                    </p>
                </div>
            @endforelse
        @endif
    </div>
</div>
