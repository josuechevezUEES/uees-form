<div class="mb-4">
    <div class="row mb-3">
        @if ($activar_edicion == true)
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" name="nombre_pregunta" id="nombre_pregunta" placeholder="Nueva Preguntas"
                        class="form-control form-control-border" wire:model='nombre_pregunta'>

                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-dark" wire:click='desactivar_edicion'>
                            <i class="fas fa-save"></i>
                            <div wire:loading.delay wire:target='desactivar_edicion'>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="col-sm-12">
                <h3>
                    {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                    {{ $pregunta->nombre }}

                    <button type="button" class="btn btn-sm btn-outline-dark" wire:click='activar_edicion'>
                        <i class="fas fa-pencil-alt"></i>
                        <div wire:loading.delay wire:target='activar_edicion'>
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-dark"
                        wire:click="mostrar_formulario_nueva_opcion">
                        Agregar Opcion
                        <div wire:loading.delay wire:target='mostrar_formulario_nueva_opcion'>
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </button>
                </h3>
            </div>
        @endif
    </div>

    @if (isset($pregunta->opciones))
        <div class="row">
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-auto mb-3">
                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-seleccion-multiple-opcion
                            :seccion="$seccion" :pregunta="$pregunta" :opcion="$opcion" wire:key="{{ $opcion->id . time() }}" />
                    </div>
                @else
                    <div class="col-sm-auto mb-3">
                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-seleccion-multiple-opcion
                            :seccion="$seccion" :pregunta="$pregunta" :opcion="$opcion" wire:key="{{ $opcion->id . time() }}" />
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    @endif

    @if ($mostrar_formulario)
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-sm btn-outline-dark" wire:click='almacenar_opcion()'
                            wire:target="cancelar_almacenar_opcion,nuevo_nombre_opcion"
                            wire:loading.attr="cancelar_almacenar_opcion">
                            <i class="fas fa-save"></i>
                            <div wire:loading.delay wire:target='almacenar_opcion'>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </button>
                    </div>

                    <input type="text" name="nuevo_nombre_opcion" id="nuevo_nombre_opcion"
                        wire:model='nuevo_nombre_opcion' placeholder="Nueva opcion"
                        class="form-control form-control-sm border border-bottom border-dark">

                    <div class="input-group-append">
                        <button type="button" class="btn btn-sm btn-outline-dark"
                            wire:click='cancelar_almacenar_opcion()' wire:target="almacenar_opcion,nuevo_nombre_opcion"
                            wire:loading.attr="almacenar_opcion">
                            <i class="fas fa-times-circle"></i>
                            <div wire:loading.delay wire:target='cancelar_almacenar_opcion'>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                @error('nuevo_nombre_opcion')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    @endif
</div>
