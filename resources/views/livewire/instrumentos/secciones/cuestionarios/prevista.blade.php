<div class="px-5 w-100">
    <div class="card">
        <div class="card-body bg-light">
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
                                <input type="{{ $opcion['entrada'] }}"
                                    class="form-control form-control-border border-width-2"
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

            @if ($tipo_pregunta_id == 4)
                <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
                <div class="row">
                    @if (isset($opciones_creadas))
                        @forelse ($opciones_creadas as $opcion)
                            <div class="col-sm-auto pb-3">
                                <input type="{{ $opcion['entrada'] }}" class="form-radio-input">
                                {{ $opcion['nombre'] }}
                            </div>
                        @empty
                        @endforelse
                    @endif
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">{{ $comentario }}</label>
                            <input type="text" class="form-control form-control-border border-width-2">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
