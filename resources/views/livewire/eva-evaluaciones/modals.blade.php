<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark-blue text-light">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Evaluacion</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @include('livewire.eva-evaluaciones.form')
                    <div wire:loading.delay wire:target='store'>
                        <div class="mt-2">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Procesando, porfavor espere...
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">
                    Cerrar
                </button>
                <button type="button" wire:click.prevent="store()"
                    wire:target="store,tipo_evaluacion_id,instrumento_id,fecha_inicio_evaluacion,estado,fecha_fin_evaluacion,estado"
                    wire:loading.attr="disabled" class="btn bg-dark-blue text-light">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark-blue text-light">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Evaluacion</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    @include('livewire.eva-evaluaciones.form')
                    <div wire:loading.delay wire:target='edit,update'>
                        <div class="mt-2">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Procesando, porfavor espere...
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">
                    Cerrar
                </button>
                <button type="button" wire:click.prevent="update()"
                    wire:target="edit,update,tipo_evaluacion_id,instrumento_id,fecha_inicio_evaluacion,estado,fecha_fin_evaluacion,estado"
                    wire:loading.attr="disabled" class="btn bg-dark-blue text-light">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
