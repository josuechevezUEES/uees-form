<div>
    <div class="row p-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <strong>Facultad</strong>
                            <p class="text-capitalize">{{ $usuario->facultad_nombre }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <strong>Carrera</strong>
                            <p class="text-capitalize">{{ $usuario->carrera_nombre }}</p>
                        </div>
                        <div class="col-md-12 col-sm-12 d-none">
                            <strong>Nombre</strong>
                            <p class="text-capitalize">
                                {{ $usuario->nombre_estudiante($usuario->cif)->CLINAM }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-4 gap-4" wire:ignore>
        @forelse ($preguntas as $pregunta)
            <div class="col-12" wire:ignore>
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($pregunta->tipo_pregunta_id == 1)
                            <div id="contenedor-pregunta-{{ $pregunta->id }}">
                                <livewire:estudiantes.cuestionario.pregunta.pregunta :pregunta="$pregunta" :seccion="$seccion"
                                    wire:key="$pregunta->id" />
                            </div>
                        @endif

                        @if ($pregunta->tipo_pregunta_id == 2)
                            <div id="contenedor-pregunta-{{ $pregunta->id }}">
                                <livewire:estudiantes.cuestionario.pregunta-abierta.pregunta-abierta :pregunta="$pregunta"
                                    :seccion="$seccion" wire:key="$pregunta->id" />
                            </div>
                        @endif

                        @if ($pregunta->tipo_pregunta_id == 3)
                            <div id="contenedor-pregunta-{{ $pregunta->id }}">
                                <livewire:estudiantes.cuestionario.pregunta-opcion-multiple.pregunta-opcion-multiple :pregunta="$pregunta" :seccion="$seccion" wire:key="$pregunta->id" />
                            </div>
                        @endif

                        @if ($pregunta->tipo_pregunta_id == 4)
                            <div id="contenedor-pregunta-{{ $pregunta->id }}">
                                <livewire:estudiantes.cuestionario.pregunta-cerrada-comentario.pregunta-cerrada-comentario :pregunta="$pregunta" :seccion="$seccion" wire:key="$pregunta->id" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                @include('adminLTE.errors.datos-no-encontrados')
            </div>
        @endforelse

        <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary" wire:click.prevent="store()"
                wire:target="store,render,obtenerRespuesta,focusPregunta, repuestas, contador_preguntas_pendiente"
                wire:loading.attr="disabled">
                <span wire:target="store" wire:loading.class="d-none">
                    Enviar
                </span>

                <span wire:loading.delay wire:target="store" wire:loading.class.remove="d-none" class="d-none">
                    Enviando...
                </span>
            </button>
        </div>
    </div>
</div>

@section('js')
    <script>
        window.addEventListener('focusPregunta', event => {

            var preguntaId = event.detail.preguntaId;
            var seccionId = event.detail.seccionId;
            var subNumeral = event.detail.subNumeral;

            console.log(event.detail);

            var contenedor = 'contenedor-pregunta-' + preguntaId
            var elementoContenedor = document.getElementById(contenedor);

            // Mostrar confirmación nativa
            var confirmed = confirm("La pregunta " + seccionId + "." + subNumeral + " esta pendiente");

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

            var preguntaId = "";
            // var seccionId = "";
        })
    </script>
@endsection
