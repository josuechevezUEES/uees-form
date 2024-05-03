<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Pregunta</h5>
                <div class="card-tools">
                    <button wire:click.prevent="cancel()" type="button" class="btn-close text-warning"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row p-2">
                        <div class="col-sm-6">
                            @include('livewire.instrumentos.secciones.cuestionarios.form')
                            <div wire:loading.delay
                                wire:target='crear,obtener_numero_total_preguntas,updatedTipoPreguntaId'>
                                <div class="mt-2 px-5">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    Procesando, porfavor espere...
                                </div>
                            </div>
                        </div>
                        @if ($tipo_pregunta_id)
                            <div class="col-sm-6">
                                @include('livewire.instrumentos.secciones.cuestionarios.opciones')
                                <br>
                                @include('livewire.instrumentos.secciones.cuestionarios.prevista')
                            </div>
                        @else
                            <div class="col-sm-6 px-5">
                                <p class="text-muted text-center">
                                    Completa le formulario para agregar opciones
                                </p>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">
                    Cerrar
                </button>
                <button type="button" wire:click.prevent="store()"
                    wire:target="store,cuestionario_id,sub_numeral,requerido,nombre,estado,tipo_pregunta_id,nombre_opcion,comentario"
                    wire:loading.attr="disabled" class="btn bg-navy">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Ins Instrumentos Pregunta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    @include('livewire.instrumentos.secciones.cuestionarios.form')

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()"
                    wire:target="update,cuestionario_id,sub_numeral,requerido,nombre,estado,tipo_pregunta_id,nombre_opcion,comentario"
                    wire:loading.attr="disabled" class="btn bg-navy">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
