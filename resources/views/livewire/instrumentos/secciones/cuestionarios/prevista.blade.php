<div class="p-3 w-100">
    @if ($tipo_pregunta_id == 1)
        <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
        <div class="row">
            @if (isset($opciones_creadas))
                @forelse ($opciones_creadas as $opcion)
                    <div class="col-sm-auto">
                        <input type="{{ $opcion['entrada'] }}" class="form-radio-input">
                        {{ $opcion['nombre'] }}
                    </div>
                @empty
                @endforelse
            @endif
        </div>
    @endif

    @if ($tipo_pregunta_id == 2)
        <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
        <div class="row">
            @if (isset($opciones_creadas))
                @forelse ($opciones_creadas as $opcion)
                    <div class="col-sm-12">
                        <input type="{{ $opcion['entrada'] }}" class="form-control form-control-border border-width-2"
                            placeholder="{{ $opcion['nombre'] }}">
                    </div>
                @empty
                @endforelse
            @endif
        </div>
    @endif


    @if ($tipo_pregunta_id == 3)
        <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
        <div class="row">
            @if (isset($opciones_creadas))
                @forelse ($opciones_creadas as $opcion)
                    <div class="col-sm-auto">
                        <div class="form-group form-check">
                            <input type="{{ $opcion['entrada'] }}" class="form-check-input"
                                id="check{{ $opcion['nombre'] }}">
                            <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                {{ $opcion['nombre'] }}
                            </label>
                        </div>
                    </div>
                @empty
                @endforelse
            @endif
        </div>
    @endif

</div>
