<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Rol</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">
                        @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name"></label>
                        <input wire:model="guard_name" type="text" class="form-control" id="guard_name"
                            placeholder="Guard Name">
                        @error('guard_name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                <button type="button" wire:click.prevent="store()" wire:target="store,name,guard_name"
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-navy">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Rol</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">
                        @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name"></label>
                        <input wire:model="guard_name" type="text" class="form-control" id="guard_name"
                            placeholder="Guard Name">
                        @error('guard_name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div wire:loading.delay wire:target='update'>
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
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cerrar
                </button>
                <button type="button" wire:click.prevent="update()" wire:target="update,name,guard_name"
                    wire:loading.attr="disabled" class="btn bg-navy">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
