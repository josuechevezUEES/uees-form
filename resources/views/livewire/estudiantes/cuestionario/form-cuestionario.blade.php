<div class="row p-4 gap-5" wire:ignore>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <strong>Nombre</strong>
                <p class="text-capitalize">
                    {{ $usuario->nombre_estudiante($usuario->cif)->CLINAM }}
                </p>
            </div>
            <div class="col-sm-6">
                <strong>Carrera</strong>
                <p class="text-capitalize">{{ $usuario->carrera_nombre }}</p>
            </div>
            <div class="col-sm-12">
                <strong>Facultad</strong>
                <p class="text-capitalize">{{ $usuario->facultad_nombre }}</p>
            </div>
        </div>
        <hr>
    </div>
    @forelse ($preguntas as $pregunta)
        <div class="col-sm-12" wire:ignore>
            <div class="px-3 w-100">
                @if ($pregunta->tipo_pregunta_id == 1)
                    <div id="contenedor-pregunta-{{ $pregunta->id }}" class="p-3">
                        <livewire:estudiantes.cuestionario.pregunta.pregunta :pregunta="$pregunta" :seccion="$seccion"
                            wire:key="$pregunta->id" />
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
                                            <input type="{{ $opcion['entrada'] }}" name="pregunta-{{ $pregunta->id }}"
                                                id="pregunta-{{ $pregunta->id }}"
                                                class="form-control form-control-border border-width-2"
                                                {{ $pregunta->requerido ? 'required' : null }} value=""
                                                placeholder="{{ $opcion['nombre'] }}">
                                            <input type="number" name="opcion-{{ $opcion['id'] }}"
                                                id="opcion-{{ $opcion['id'] }}" class="d-none"
                                                value="{{ $opcion['id'] }}">

                                        </div>
                                    @else
                                        <div class="col-sm-12">
                                            <input type="{{ $opcion['entrada'] }}" name="pregunta-{{ $pregunta->id }}"
                                                id="pregunta-{{ $pregunta->id }}"
                                                class="form-control form-control-border border-width-2"
                                                {{ $pregunta->requerido ? 'required' : null }} value=""
                                                placeholder="{{ $opcion['nombre'] }}">

                                            <input type="number" name="opcion-{{ $opcion['id'] }}"
                                                id="opcion-{{ $opcion['id'] }}" class="d-none"
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
                    <div id="contenedor-pregunta-{{ $pregunta->id }}" class="p-3">
                        <livewire:estudiantes.cuestionario.abierta.pregunta-abierta :pregunta="$pregunta" :seccion="$seccion"
                            wire:key="$pregunta->id" />
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
                                            <input type="{{ $opcion['entrada'] }}" name="pregunta-{{ $pregunta->id }}"
                                                id="pregunta-{{ $pregunta->id }}" value="{{ $opcion['id'] }}"
                                                {{ $pregunta->requerido ? 'required' : null }}
                                                class="form-radio-input">
                                            <label
                                                for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                                                {{ $opcion['nombre'] }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="col-sm-auto ml-md-3 mb-3">
                                            <input type="{{ $opcion['entrada'] }}" name="pregunta-{{ $pregunta->id }}"
                                                id="pregunta-{{ $pregunta->id }}" value="{{ $opcion['id'] }}"
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
                                        <input type="text" class="form-control form-control-border" value="">
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

    <div class="col-sm-3 px-3 w-100">
        <button type="submit" class="btn btn-primary" wire:click.prevent="store()">
            Enviar
        </button>
    </div>
</div>

@section('js')
    <script>
        window.addEventListener('focusPregunta', event => {

            var preguntaId = event.detail.preguntaId;
            var seccionId = event.detail.seccionId;

            var contenedor = 'contenedor-pregunta-' + preguntaId
            var elementoContenedor = document.getElementById(contenedor);

            // Mostrar confirmación nativa
            var confirmed = confirm("La pregunta " + seccionId + "." + preguntaId + " esta pendiente");

            if (confirmed && elementoContenedor) {
                // Realizar el scrollIntoView si elementoContenedor está definido
                elementoContenedor.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center',
                    inline: 'center'
                });

                // Esperar un breve período antes de enfocar para asegurar que se complete el scroll
                setTimeout(() => {
                    elementoContenedor.classList.add('border', 'border-warning', 'p-3');
                }, 300); // Puedes ajustar este valor según la velocidad de scroll
            }
        })
    </script>
@endsection
