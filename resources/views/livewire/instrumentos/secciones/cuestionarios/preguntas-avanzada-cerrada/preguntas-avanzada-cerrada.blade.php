@section('title', 'Cuestionario')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', $instrumento_id, $seccion_id) }}
@stop

<div class="pt-3">
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-dark-blue">
                            <strong>
                                Titulo de la pregunta
                            </strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="from-label">
                                    Titulo Pregunta
                                </label>
                                <div class="input-group">
                                    <input type="text" name="tituloPregunta" id="tituloPregunta"
                                        wire:model="tituloPregunta" class="form-control">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            wire:click="crearNuevaOpcion()">
                                            Agregar Opción
                                        </button>
                                    </div>
                                </div>

                            </div>

                            @if ($mostrarFormularioNuevaOpcion == true)
                                <div class="form-group">
                                    <label for="" class="form-label">
                                        Nombre Opcion
                                    </label>
                                    <div class="input-group">
                                        <input type="text" wire:model='nombreNuevaOpcion' name="nombreNuevaOpcion"
                                            id="nombreNuevaOpcion" class="form-control">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-sm btn-primary"
                                                wire:click='agregarOpcion()'>
                                                Guardar Opción
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item disabled" aria-disabled="true">
                                    <strong>
                                        Opciones
                                    </strong>
                                </li>
                                @forelse ($opciones as $key => $item)
                                    <button type="button" class="list-group-item list-group-item-action border-bottom"
                                        aria-current="true"
                                        wire:click='mostrarNuevaAccionPorOpcion({{ $key }})'>
                                        Has clic para configurar:
                                        <strong>{{ $item['nombre'] }}</strong>
                                    </button>
                                @empty
                                @endforelse
                            </ul>

                            <br>

                            <div class="mb-3">
                                <button type="button" class="btn btn-primary btn-sm" wire:click='guardarPregunta()'>
                                    Guardar pregunta
                                </button>
                            </div>

                        </div>
                        <div class="card-footer">
                            <small>
                                Sino configura acciones para alguna opciones el sistema
                                guardara la acción predeterminada
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            @if ($mostrarFormularioNuevaAccionOpcion)
                <div class="card">
                    <div class="card-header bg-dark-yellow">
                        <strong>
                            Acción de opción
                            {{ $opciones[$opcionSelecionada]['nombre'] }}
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="opcionAccionSeleccionada" class="form-label">
                                    Acciones
                                </label>
                                <select wire:model="opcionAccionSeleccionada" name="opcionAccionSeleccionada"
                                    id="opcionAccionSeleccionada" class="form-control form-select">
                                    <option value="">--seleccionar--</option>
                                    <option value="0">No habilitar Pregunta</option>
                                    <option value="1">Habilitar pregunta</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="" class="form-label">
                                        Tipos de Preguntas
                                        <small>(Para pregunta hija)</small>
                                    </label>
                                    <select wire:model="tipoPreguntaSeleccionadaHija"
                                        name="tipoPreguntaSeleccionadaHija" id="tipoPreguntaSeleccionadaHija"
                                        class="form-select form-control">
                                        <option value="">--seleccionar--</option>
                                        @forelse ($tiposPreguntas as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nombre }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group mb-3">
                                    <label for="form-label">
                                        Titulo Pregunta
                                        <small>(Para pregunta hija)</small>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" wire:model="tituloPreguntaHija" name="tituloPreguntaHija"
                                            id="tituloPreguntaHija" class="form-control">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-primary"
                                                wire:click='crearNuevaOpcionHija()'>
                                                Agregar
                                                Opcion
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($opcionAccionSeleccionada == 1)
                                <div class="col-sm-6 mb-3">
                                    @if ($tipoPreguntaSeleccionadaHija == '1')
                                        @if ($mostrarFormularioNuevaOpcionPreguntaHija)
                                            <div class="form-group">
                                                <label for="nombreNuevaOpcionHija">Titulo Opcion</label>
                                                <div class="input-group">
                                                    <input type="text" name="nombreNuevaOpcionHija"
                                                        id="nombreNuevaOpcionHija" wire:model="nombreNuevaOpcionHija"
                                                        class="form-control">
                                                    <button type="button" wire:click='agregarOpcionHija()'
                                                        class="btn btn-primary">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            @endif

                            @if ($opcionesPreguntaHija)
                                <div class="col-sm-12">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <strong>
                                                Opciones de: {{  $tituloPreguntaHija }}
                                            </strong>
                                        </div>
                                        @forelse ($opcionesPreguntaHija as $key => $item)
                                            <div class="col-sm-3 mb-3 px-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="inputRadios"
                                                        id="{{ $key }}inputRadios"
                                                        value="{{ $item['nombre'] }}">
                                                    <label class="form-check-label"
                                                        for="{{ $key }}inputRadios">
                                                        {{ $item['nombre'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if ($activarVitaPrevia == 'true')
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <strong>Vista Previa</strong>
                    </div>
                    <div class="card-body">
                        @if ($tituloPregunta)
                            <div class="form-group">
                                <label>
                                    {{ $tituloPregunta }}
                                </label>
                                <div class="row">
                                    @forelse ($opciones as $key => $item)
                                        <div class="col-sm-auto">
                                            @if (isset($item['accion']))
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="previaRadios0" id="previaRadios0"
                                                        value="{{ $item['nombre'] }}"
                                                        wire:click="mostrarVistaPreviaMostrarPreguntaHija('true')">
                                                    <label class="form-check-label" for="previaRadios0">
                                                        {{ $item['nombre'] }}
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="previaRadios0" id="previaRadios0"
                                                        wire:click="mostrarVistaPreviaMostrarPreguntaHija('false')"
                                                        value="{{ $item['nombre'] }}">
                                                    <label class="form-check-label" for="previaRadios0">
                                                        {{ $item['nombre'] }}
                                                    </label>
                                                </div>
                                            @endif

                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @endif

                        @if ($vistaPreviaOpcionSeleccionada == 'true')
                            <div class="form-group">
                                <label for="">
                                    <strong>
                                        {{ $tituloPreguntaHija }}
                                    </strong>
                                </label>

                                <div class="row">
                                    @forelse ($opcionesPreguntaHija as $key => $item)
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="inputRadios"
                                                    id="{{ $key }}inputRadios"
                                                    value="{{ $item['nombre'] }}">
                                                <label class="form-check-label" for="{{ $key }}inputRadios">
                                                    {{ $item['nombre'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
