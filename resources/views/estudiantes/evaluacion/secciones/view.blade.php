@section('title', $evaluacion->tiposEvaluacione->nombre)

<section class="d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header px-3 bg-warning">
            <div class="row">
                <div class="col-sm-2 pt-3">
                    <img src="{{ asset('/img/logo-uees.png') }}" alt="logo-uees" class="w-75 img-fluid">
                </div>
                <div class="col-sm-10 pt-4">
                    <h1 class="font-weight-bolder text-dark-blue">
                        <strong>
                            Universidad Evangelica de El Salvador
                        </strong>
                    </h1>
                    <h4 class="font-weight-normal text-dark-blue">
                        <strong>
                            {{ $evaluacion->tiposEvaluacione->nombre }}
                            {{ $evaluacion->fecha_fin_evaluacion ? date('Y', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}
                        </strong>
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form
                action="{{ route('estudiantes.evaluaciones.seccion.almacenar_respuestas', ['evaluacion_id' => $evaluacion->id, 'seccion_id' => $seccion->id]) }}"
                method="POST">
                @csrf
                <div class="row p-4 gap-5">
                    @forelse ($preguntas as $pregunta)
                        <div class="col-sm-12">
                            <div class="px-3 w-100">
                                @if ($pregunta->tipo_pregunta_id == 1)
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
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="pregunta-{{ $pregunta->id }}"
                                                                id="pregunta-{{ $pregunta->id }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                value="{{ $opcion['id'] }}" class="form-radio-input">
                                                            <label
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>

                                                        </div>
                                                    @else
                                                        <div class="col-sm-auto ml-md-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="pregunta-{{ $pregunta->id }}"
                                                                id="pregunta-{{ $pregunta->id }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                value="{{ $opcion['id'] }}" class="form-radio-input">
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
                                            @if ($pregunta->requerido)
                                                <span class="text-danger">*</span>
                                            @endif
                                        </h3>
                                        <div class="row pt-3">
                                            @if (isset($pregunta->opciones))
                                                @forelse ($pregunta->opciones as $opcion)
                                                    @if ($loop->iteration == 1)
                                                        <div class="col-sm-12">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="pregunta-{{ $pregunta->id }}"
                                                                id="pregunta-{{ $pregunta->id }}"
                                                                class="form-control form-control-border border-width-2"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                value="" placeholder="{{ $opcion['nombre'] }}">
                                                            <input type="number" name="opcion-{{ $opcion['id'] }}" id="opcion-{{ $opcion['id'] }}" class="d-none"
                                                            value="{{ $opcion['id'] }}">

                                                        </div>
                                                    @else
                                                        <div class="col-sm-12">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="pregunta-{{ $pregunta->id }}"
                                                                id="pregunta-{{ $pregunta->id }}"
                                                                class="form-control form-control-border border-width-2"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                value="" placeholder="{{ $opcion['nombre'] }}">

                                                            <input type="number" name="opcion-{{ $opcion['id'] }}" id="opcion-{{ $opcion['id'] }}" class="d-none"
                                                            value="{{ $opcion['id'] }}">
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
                                                                <input type="{{ $opcion['entrada'] }}"
                                                                    class="form-check-input"
                                                                    value="{{ $opcion['nombre'] }}"
                                                                    name="pregunta-{{ $pregunta->id }}"
                                                                    id="pregunta-{{ $pregunta->id }}" <label
                                                                    class="form-check-label"
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
                                                                    value="{{ $opcion['nombre'] }}"
                                                                    name="pregunta-{{ $pregunta->id }}"
                                                                    id="pregunta-{{ $pregunta->id }}" <label
                                                                    class="form-check-label"
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
                                            @if ($pregunta->requerido)
                                                <span class="text-danger">*</span>
                                            @endif
                                        </h3>
                                        <div class="row pt-3">
                                            @if (isset($pregunta->opciones))
                                                @forelse ($pregunta->opciones as $opcion)
                                                    @if ($loop->iteration == 1)
                                                        <div class="col-sm-auto mb-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="pregunta-{{ $pregunta->id }}"
                                                                id="pregunta-{{ $pregunta->id }}"
                                                                value="{{ $opcion['id'] }}"
                                                                {{ $pregunta->requerido ? 'required' : null }}
                                                                class="form-radio-input">
                                                            <label
                                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                                {{ $opcion['nombre'] }}
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="col-sm-auto ml-md-3 mb-3">
                                                            <input type="{{ $opcion['entrada'] }}"
                                                                name="pregunta-{{ $pregunta->id }}"
                                                                id="pregunta-{{ $pregunta->id }}"
                                                                value="{{ $opcion['id'] }}"
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
                                            @endif
                                        </div>
                                        @if (isset($pregunta->comentario))
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group pt-3">
                                                        <strong>
                                                            {{ $pregunta->comentario->comentario }}
                                                        </strong>
                                                        <input type="text" class="form-control form-control-border"
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
                        <button type="submit" class="btn bg-dark-blue text-white">
                            Enviar Respuestas
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
