@section('title', 'Cuestionario')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', $instrumento_id, $seccion_id) }}
@stop

<div class="container-fluid">
    @include('livewire.instrumentos.secciones.cuestionarios.modal')
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header bg-navy">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>
                                {{ $seccion->literal }}. Instrumento
                            </h3>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" wire:click='crear()' class="btn bg-warning btn-block"
                                data-bs-toggle="modal" data-bs-target="#createDataModal">
                                Nueva
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row p-4 gap-5">
                        @forelse ($preguntas_instrumento as $pregunta)
                            <div class="col-sm-10">
                                <div class="px-3 w-100">
                                    @if ($pregunta->tipo_pregunta_id == 1)
                                        <label for="">
                                            {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                                            {{ $pregunta->nombre }}
                                        </label>
                                        <div class="row pt-3">
                                            @if (isset($pregunta->opciones))
                                                @forelse ($pregunta->opciones as $opcion)
                                                    @if ($loop->iteration == 1)
                                                        <div class="col-sm-auto">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                class="form-radio-input">
                                                            {{ $opcion['nombre'] }}
                                                        </div>
                                                    @else
                                                        <div class="col-sm-auto ml-md-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                class="form-radio-input">
                                                            {{ $opcion['nombre'] }}
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
                            <div class="col-sm-12">
                                @include('adminLTE.errors.datos-no-encontrados')
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
