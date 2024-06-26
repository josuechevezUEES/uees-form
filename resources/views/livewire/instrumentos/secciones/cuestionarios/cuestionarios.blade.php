@section('title', 'Cuestionario')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', $instrumento_id, $seccion_id) }}
@stop

<div class="container-fluid">
    @include('livewire.instrumentos.secciones.cuestionarios.modal')
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-dark-blue text-light">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>
                                {{ $seccion->literal }}. Instrumento
                            </h2>
                        </div>
                        <div class="col-sm-2">
                            <div class="dropdown">
                                <button class="btn bg-dark-yellow dropdown-toggle btn-block" type="button"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Nueva Pregunta
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" wire:click='crear()' data-bs-toggle="modal"
                                        data-bs-target="#createDataModal">
                                        Crear Pregunta Rápida
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ route('instrumentos_evaluaciones.secciones.cuestionarios_avanzado', ['instrumento_id' => $instrumento_id, 'seccion_id' => $seccion_id]) }}">
                                        Crear Pregunta Avanzada
                                    </a>
                                </div>
                            </div>
                            <button type="button" wire:click='crear()' class="btn bg-dark-yellow btn-block d-none"
                                data-bs-toggle="modal" data-bs-target="#createDataModal">
                                Nueva
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row p-4 gap-5">
                        @forelse ($preguntas_instrumento as $pregunta)
                            <div class="col-sm-12" wire:ignore>
                                <div class="px-3 w-100">
                                    @if ($pregunta->tipo_pregunta_id == 1)
                                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada
                                            :pregunta="$pregunta" :seccion="$seccion" wire:key="{{ 'pregunta-' . now() }}" />
                                    @endif

                                    @if ($pregunta->tipo_pregunta_id == 2)
                                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-abierta
                                            :pregunta="$pregunta" :seccion="$seccion" wire:key="{{ 'pregunta-' . now() }}" />
                                    @endif

                                    @if ($pregunta->tipo_pregunta_id == 3)
                                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-seleccion-multiple
                                            :pregunta="$pregunta" :seccion="$seccion" wire:key="{{ 'pregunta-' . now() }}" />
                                    @endif

                                    @if ($pregunta->tipo_pregunta_id == 4)
                                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-compleja
                                            :pregunta="$pregunta" :seccion="$seccion" :instrumento_id="$instrumento_id"
                                            wire:key="{{ 'pregunta-' . now() }}" />
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
