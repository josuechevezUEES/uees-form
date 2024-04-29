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
            <form wire:submit.prevent="almacenar">
                <div class="row p-4 gap-5">
                    @forelse ($cuestionario->instrumentoPreguntas as $pregunta)
                        <div class="col-sm-12">
                            <div class="px-3 w-100">
                                @if ($pregunta->tipo_pregunta_id == 1)
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
                                                            <input type="{{ $opcion['entrada'] }}" 
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                wire:model="respuesta."
                                                                class="form-radio-input">
                                                            <label
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>

                                                        </div>
                                                    @else
                                                        <div class="col-sm-auto ml-md-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                class="form-radio-input">
                                                            <label
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @empty
                                                @endforelse

                                                @error("{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}")
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if ($pregunta->tipo_pregunta_id == 2)
                                    <div class="mb-4">
                                        <h3>
                                            {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                            {{ $pregunta->nombre }}
                                        </h3>
                                        <div class="row pt-3">
                                            @if (isset($pregunta->opciones))
                                                @forelse ($pregunta->opciones as $opcion)
                                                    @if ($loop->iteration == 1)
                                                        <div class="col-sm-12">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                class="form-control form-control-border border-width-2"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                placeholder="{{ $opcion['nombre'] }}">
                                                        </div>
                                                    @else
                                                        <div class="col-sm-12">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                class="form-control form-control-border border-width-2"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                placeholder="{{ $opcion['nombre'] }}">
                                                        </div>
                                                    @endif
                                                @empty
                                                @endforelse
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if ($pregunta->tipo_pregunta_id == 3)
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
                                                            <div class="form-group form-check">
                                                                <input type="{{ $opcion['entrada'] }}"
                                                                    class="form-check-input"
                                                                    name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
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
                                                                    name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
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
                                    </div>
                                @endif

                                @if ($pregunta->tipo_pregunta_id == 4)
                                    <div class="mb-4">
                                        <h3>
                                            {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                            {{ $pregunta->nombre }}
                                        </h3>
                                        <div class="row pt-3">
                                            @if (isset($pregunta->opciones))
                                                @forelse ($pregunta->opciones as $opcion)
                                                    @if ($loop->iteration == 1)
                                                        <div class="col-sm-auto mb-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                                                                class="form-radio-input">
                                                            <label
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="col-sm-auto ml-md-3 mb-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}"
                                                                id="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}"
                                                                class="form-radio-input">
                                                            <label
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
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
                                    </div>
                                @endif
                            </div>

                        </div>
                    @empty
                        <div class="col-sm-12">
                            @include('adminLTE.errors.datos-no-encontrados')
                        </div>
                    @endforelse
                    <div class="col-sm-12 px-4">
                        <button type="submit" class="btn btn-sm bg-navy">
                            Enviar Respuestas
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
