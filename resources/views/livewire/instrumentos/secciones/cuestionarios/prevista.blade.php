<div class="px-5 w-100">
    <div class="card">
        <div class="card-body bg-light">
            {{-- Pregunta Cerrada --}}
            @if ($tipo_pregunta_id == 1)
                <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
                <div class="row">
                    @if (isset($opciones_creadas))
                        @forelse ($opciones_creadas as $index => $opcion)
                            <div class="col-sm-auto">
                                <div class="p-3">
                                    <input type="{{ $opcion['entrada'] }}" class="form-check-input"
                                        id="check{{ $opcion['nombre'] }}">
                                    <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                        {{ $opcion['nombre'] }}
                                    </label>
                                    <button type="button" class="btn btn-sm btn-close"
                                        wire:click="eliminar_opcion_vista_preva({{ $index }})"></button>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
            @endif

            {{-- Pregunta Abierta --}}
            @if ($tipo_pregunta_id == 2)
                <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
                <div class="row">
                    @if (isset($opciones_creadas))
                        @forelse ($opciones_creadas as $index => $opcion)
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button"
                                            wire:click="eliminar_opcion_vista_preva({{ $index }})">
                                            x
                                        </button>
                                    </div>
                                    <input type="{{ $opcion['entrada'] }}"
                                        class="form-control form-control-border border-width-2"
                                        placeholder="{{ $opcion['nombre'] }}" disabled>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
            @endif

            {{-- Pregunta Seleccion Multiple --}}
            @if ($tipo_pregunta_id == 3)
                <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
                <div class="row">
                    @if (isset($opciones_creadas))
                        @forelse ($opciones_creadas as $index => $opcion)
                            <div class="col-sm-auto">
                                <div class="p-3">
                                    <input type="{{ $opcion['entrada'] }}" class="form-check-input"
                                        id="check{{ $opcion['nombre'] }}">
                                    <label class="form-check-label" for="check{{ $opcion['nombre'] }}">
                                        {{ $opcion['nombre'] }}
                                    </label>
                                    <button type="button" class="btn btn-sm btn-close"
                                        wire:click="eliminar_opcion_vista_preva({{ $index }})"></button>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
            @endif

            {{-- Pregunta Cerrada Compleja --}}
            @if ($tipo_pregunta_id == 4)
                <label for="">{{ $sub_numeral }}) {{ $nombre }}</label>
                <div class="row">
                    @if (isset($opciones_creadas))
                        @forelse ($opciones_creadas as $index => $opcion)
                            <div class="col-sm-auto pb-3">
                                <input type="{{ $opcion['entrada'] }}" class="form-radio-input">
                                {{ $opcion['nombre'] }}
                                <button type="button" class="btn btn-sm btn-close"
                                    wire:click="eliminar_opcion_vista_preva({{ $index }})"></button>
                            </div>
                        @empty
                        @endforelse
                        <div class="col-sm-12">
                            <strong>Vista previa comentario</strong>
                            <br>
                            <div class="form-group">
                                <label for="">{{ $comentario }}</label>
                                <input type="text" class="form-control form-control-border border-width-2">
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
