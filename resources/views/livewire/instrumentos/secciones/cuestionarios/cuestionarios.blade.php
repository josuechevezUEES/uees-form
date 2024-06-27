@section('title', 'Cuestionario')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', $instrumento_id, $seccion_id) }}
@stop

<div class="container-fluid">
    @include('livewire.instrumentos.secciones.cuestionarios.modal')
    <div class="row justify-content-center">
        <div class="{{ $activarFormularioVincularPreguntas == true ? 'col-sm-6 fadeIn' : 'col-sm-12 fadeInLeft' }}">
            <div class="card">
                <div class="card-header bg-dark-blue text-light">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>
                                <strong>
                                    {{ $seccion->literal }}. Instrumento
                                </strong>
                            </h3>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" wire:click='crear()' class="btn bg-dark-yellow btn-block"
                                data-bs-toggle="modal" data-bs-target="#createDataModal">
                                <i class="fas fa-plus"></i>
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
        @if ($activarFormularioVincularPreguntas)
            <div class="col-sm-6 fadeIn">
                <div class="card">
                    <div class="card-header  bg-dark-blue">
                        <h3 class="card-title">
                            <strong>Nueva Vinculación</strong>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"
                                wire:click="cerrarFormularioVincular">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" wire:ignore>
                            <div class="col-sm-6">
                                <ul id="sortable1" class="connectedSortable list-group list-group-flush">
                                    <li class="list-group-item disabled" aria-disabled="true">
                                        Preguntas Disponibles
                                    </li>
                                    @forelse ($listaPreguntas as $pregunta)
                                        <li class="ui-state-highlight list-group-item" wire:key="{{ $pregunta->id }}"
                                            value="{{ $pregunta->id }}">
                                            {{ $pregunta->nombre }}
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul id="sortable2" class="connectedSortable list-group list-group-flush">
                                    <li class="list-group-item disabled" aria-disabled="true">
                                        Preguntas Agregadas
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/RubaXa/Sortable/Sortable.min.js"></script>
    <script>
        window.addEventListener('activarSortable', event => {
            activarSortable();
        })

        const activarSortable = () => {
            const sortable1 = document.getElementById('sortable1');
            const sortable2 = document.getElementById('sortable2');

            if (sortable1 && sortable2) {
                Sortable.create(sortable1, {
                    group: 'list-1',
                    animation: 150,
                    draggable: '.list-group-item',
                    handle: '.list-group-item',
                    chosenClass: 'active',
                    onAdd: function(evt) {
                        const item = evt.item;
                        if (item) {
                            const value = item.getAttribute('value');
                            console.log('Elemento eliminado - Value:', value);
                            Livewire.emit('eliminarPreguntaPorId', value);
                        } else {
                            console.error('Elemento undefined en sortable1 onAdd');
                        }
                    }
                });

                Sortable.create(sortable2, {
                    group: 'list-1',
                    animation: 150,
                    draggable: '.list-group-item',
                    handle: '.list-group-item',
                    chosenClass: 'active',
                    onAdd: function(evt) {
                        const item = evt.item; // Elemento que se agregó a sortable2
                        if (item) {
                            const value = item.getAttribute(
                                'value'); // Obtener el valor del atributo 'value'
                            console.log('Elemento agregado:', value);
                            Livewire.emit('agregarPreguntaPorVincular', value);
                        } else {
                            console.error('Elemento undefined en sortable2 onAdd');
                        }
                    }
                });
            } else {
                console.error('sortable1 o sortable2 no encontrados');
            }
        };
    </script>
@endsection
