<div class="container">
    <div class="card">
        <div class="card-header bg-warning">
            <div class="row">
                <div class="col-sm-11 text-start d-flex align-items-center">
                    <h3>
                        {{ $seccion->literal }}.{{ $seccion->nombre }}
                    </h3>
                </div>
                <div class="col-sm-1">
                    <img src="{{ asset('img/logo-uees.png') }}" alt="" class="img-fluid" width="100">
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    @forelse ($cuestionario->instrumentoPreguntas as  $pregunta)
                        <div class="col-sm-10 mb-3">
                            <div class="px-3 w-100">
                                @if ($pregunta->tipo_pregunta_id == 1)
                                    <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}">
                                        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                        {{ $pregunta->nombre }}
                                    </label>
                                    <div class="row pt-3">
                                        @if (isset($pregunta->opciones))
                                            @forelse ($pregunta->opciones as $opcion)
                                                @if ($loop->iteration == 1)
                                                    <div class="col-sm-auto mb-3">
                                                        <div class="form-check">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                class="form-radio-input form-input-opcion"
                                                                wire:model="respuestas"
                                                                id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                value="{{ $opcion['id'] }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}>
                                                            <label class="form-check-label"
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-sm-auto ml-md-3">
                                                        <div class="form-check">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                class="form-radio-inpu form-input-opcion"
                                                                wire:model="respuestas"
                                                                id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                value="{{ $opcion['id'] }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}>
                                                            <label class="form-check-label"
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                @endif

                                @if ($pregunta->tipo_pregunta_id == 2)
                                    <label for="">
                                        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                        {{ $pregunta->nombre }}
                                    </label>
                                    <div class="row pt-3">
                                        @if (isset($pregunta->opciones))
                                            @forelse ($pregunta->opciones as $opcion)
                                                @if ($loop->iteration == 1)
                                                    <div class="col-sm-12">
                                                        <input type="{{ $opcion['entrada'] }}"
                                                            class="form-control form-control-border border-width-2"
                                                            placeholder="{{ $opcion['nombre'] }}">
                                                    </div>
                                                @else
                                                    <div class="col-sm-12">
                                                        <input type="{{ $opcion['entrada'] }}"
                                                            class="form-control form-control-border border-width-2"
                                                            placeholder="{{ $opcion['nombre'] }}">
                                                    </div>
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                @endif

                                @if ($pregunta->tipo_pregunta_id == 3)
                                    <label for="">
                                        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                        {{ $pregunta->nombre }}
                                    </label>
                                    <div class="row pt-3">
                                        @if (isset($pregunta->opciones))
                                            @forelse ($pregunta->opciones as $opcion)
                                                @if ($loop->iteration == 1)
                                                    <div class="col-sm-auto">
                                                        <div class="form-group form-check">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                class="form-check-input"
                                                                id="check{{ $opcion['nombre'] }}">
                                                            <label class="form-check-label"
                                                                for="check{{ $opcion['nombre'] }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-sm-auto ml-md-3">
                                                        <div class="form-group form-check">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                class="form-check-input"
                                                                id="check{{ $opcion['nombre'] }}">
                                                            <label class="form-check-label"
                                                                for="check{{ $opcion['nombre'] }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                @endif

                                @if ($pregunta->tipo_pregunta_id == 4)
                                    <label for="">
                                        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                        {{ $pregunta->nombre }}
                                    </label>
                                    <div class="row pt-3">
                                        @if (isset($pregunta->opciones))
                                            @forelse ($pregunta->opciones as $opcion)
                                                @if ($loop->iteration == 1)
                                                    <div class="col-sm-auto mb-3">
                                                        <input type="{{ $opcion['entrada'] }}"
                                                            class="form-radio-input">
                                                        {{ $opcion['nombre'] }}
                                                    </div>
                                                @else
                                                    <div class="col-sm-auto ml-md-3 mb-3">
                                                        <input type="{{ $opcion['entrada'] }}"
                                                            class="form-radio-input">
                                                        {{ $opcion['nombre'] }}
                                                    </div>
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif

                                        <div class="col-sm-12">
                                            <div class="form-group pt-3">
                                                <strong>
                                                    {{ $pregunta->comentario->comentario }}
                                                </strong>
                                                <input type="text" class="form-control form-control-border">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    @empty

                    @endforelse

                    <div class="col-sm-12 px-4">
                        <button type="submit" wire:click='almacenar()' class="btn btn-sm bg-navy">
                            Enviar Respuestas
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
