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
                    <div id="contenedor-pregunta-{{ $pregunta->id }}" class="p-3">
                        <livewire:estudiantes.cuestionario.pregunta-abierta.pregunta-abierta :pregunta="$pregunta"
                            :seccion="$seccion" wire:key="$pregunta->id" />
                    </div>
                @endif

                @if ($pregunta->tipo_pregunta_id == 3)
                    <div id="contenedor-pregunta-{{ $pregunta->id }}" class="p-3">
                        <livewire:estudiantes.cuestionario.pregunta-opcion-multiple.pregunta-opcion-multiple
                            :pregunta="$pregunta" :seccion="$seccion" wire:key="$pregunta->id" />
                    </div>
                @endif

                @if ($pregunta->tipo_pregunta_id == 4)
                    <div id="contenedor-pregunta-{{ $pregunta->id }}" class="p-3">
                        <livewire:estudiantes.cuestionario.pregunta-cerrada-comentario.pregunta-cerrada-comentario
                            :pregunta="$pregunta" :seccion="$seccion" wire:key="$pregunta->id" />
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
