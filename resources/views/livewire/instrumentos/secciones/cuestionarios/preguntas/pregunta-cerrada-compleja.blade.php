<div class="mb-4">
    <div class="row mb-3">
        <div class="col-sm-12">
            @if ($activar_edicion == true)
                <div class="input-group">
                    <input type="text" name="nombre_pregunta" id="nombre_pregunta" wire:model='nombre_pregunta'
                        placeholder="Nueva Preguntas" class="form-control form-control-border">

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
            @else
                <h4>
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

                    @if ($mostrar_text_area_comentario == false)
                        <button type="button" class="btn btn-sm btn-outline-dark" wire:click="mostrar_comentario">
                            Mostrar Comentario
                            <div wire:loading.delay wire:target='mostrar_comentario'>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </button>
                    @else
                        <button type="button" class="btn btn-sm btn-outline-dark" wire:click="ocultar_comentario">
                            Ocultar Comentario
                            <div wire:loading.delay wire:target='ocultar_comentario'>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </button>
                    @endif
                </h4>
            @endif
        </div>
    </div>

    @if (isset($pregunta->opciones))
        <div class="row pt-3 mb-3" wire:ignore>
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-auto">
                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-compleja-opcion
                            :pregunta="$pregunta" :seccion="$seccion" :opcion="$opcion" :loop="$loop->iteration"
                            :wire:key="$loop->iteration" />
                    </div>
                @else
                    <div class="col-sm-auto">
                        <livewire:instrumentos.secciones.cuestionarios.preguntas.pregunta-cerrada-compleja-opcion
                            :pregunta="$pregunta" :seccion="$seccion" :opcion="$opcion" :loop="$loop->iteration"
                            :wire:key="$loop->iteration" />
                    </div>
                @endif
            @empty
            @endforelse
        </div>

        @if ($mostrar_text_area_comentario == true)
            <div class="border border-dark px-3 pt-3 pb-3 rounded">
                @if ($editar_comentario == true)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark btn-sm"
                                        wire:click='desactivar_edicion_comentario'>
                                        <i class="fas fa-save"></i>
                                        <div wire:loading.delay wire:target='desactivar_edicion_comentario'>
                                            <div class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <input type="text" id="editar-comentario-{{ $loop }}"
                                    name="editar-comentario-{{ $loop }}" wire:model="comentario"
                                    class="form-control form-control-sm form-control-border">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark btn-sm"
                                        wire:click='activar_edicion_comentario'>
                                        <i class="fas fa-pencil-alt"></i>
                                        <div wire:loading.delay wire:target='activar_edicion_comentario'>
                                            <div class="spinner-border spinner-border-sm" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <textarea id="comentario-{{ $loop }}" name="comentario-{{ $loop }}"
                                    placeholder="{{ $pregunta->preguntaComentario->comentario }}"
                                    class="form-control form-control-sm form-control-border"></textarea>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
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
                            wire:click='cancelar_almacenar_opcion()'
                            wire:target="almacenar_opcion,nuevo_nombre_opcion" wire:loading.attr="almacenar_opcion">
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
