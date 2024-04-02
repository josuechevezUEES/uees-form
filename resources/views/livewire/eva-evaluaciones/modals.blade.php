<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Eva Evaluacione</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipo_evaluacion_id"></label>
                        <input wire:model="tipo_evaluacion_id" type="text" class="form-control"
                            id="tipo_evaluacion_id" placeholder="Tipo Evaluacion Id">
                        @error('tipo_evaluacion_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instrumento_id"></label>
                        <input wire:model="instrumento_id" type="text" class="form-control" id="instrumento_id"
                            placeholder="Instrumento Id">
                        @error('instrumento_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio_evaluacion"></label>
                        <input wire:model="fecha_inicio_evaluacion" type="text" class="form-control"
                            id="fecha_inicio_evaluacion" placeholder="Fecha Inicio Evaluacion">
                        @error('fecha_inicio_evaluacion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin_evaluacion"></label>
                        <input wire:model="fecha_fin_evaluacion" type="text" class="form-control"
                            id="fecha_fin_evaluacion" placeholder="Fecha Fin Evaluacion">
                        @error('fecha_fin_evaluacion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado"></label>
                        <input wire:model="estado" type="text" class="form-control" id="estado"
                            placeholder="Estado">
                        @error('estado')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Eva Evaluacione</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="tipo_evaluacion_id"></label>
                        <input wire:model="tipo_evaluacion_id" type="text" class="form-control"
                            id="tipo_evaluacion_id" placeholder="Tipo Evaluacion Id">
                        @error('tipo_evaluacion_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instrumento_id"></label>
                        <input wire:model="instrumento_id" type="text" class="form-control" id="instrumento_id"
                            placeholder="Instrumento Id">
                        @error('instrumento_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio_evaluacion"></label>
                        <input wire:model="fecha_inicio_evaluacion" type="text" class="form-control"
                            id="fecha_inicio_evaluacion" placeholder="Fecha Inicio Evaluacion">
                        @error('fecha_inicio_evaluacion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin_evaluacion"></label>
                        <input wire:model="fecha_fin_evaluacion" type="text" class="form-control"
                            id="fecha_fin_evaluacion" placeholder="Fecha Fin Evaluacion">
                        @error('fecha_fin_evaluacion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado"></label>
                        <input wire:model="estado" type="text" class="form-control" id="estado"
                            placeholder="Estado">
                        @error('estado')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
