<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Eva Evaluaciones Respuesta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="evaluacion_id"></label>
                        <input wire:model="evaluacion_id" type="text" class="form-control" id="evaluacion_id" placeholder="Evaluacion Id">@error('evaluacion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="seccion_id"></label>
                        <input wire:model="seccion_id" type="text" class="form-control" id="seccion_id" placeholder="Seccion Id">@error('seccion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pregunta_id"></label>
                        <input wire:model="pregunta_id" type="text" class="form-control" id="pregunta_id" placeholder="Pregunta Id">@error('pregunta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="respuesta"></label>
                        <input wire:model="respuesta" type="text" class="form-control" id="respuesta" placeholder="Respuesta">@error('respuesta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cif"></label>
                        <input wire:model="cif" type="text" class="form-control" id="cif" placeholder="Cif">@error('cif') <span class="error text-danger">{{ $message }}</span> @enderror
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
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Eva Evaluaciones Respuesta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="evaluacion_id"></label>
                        <input wire:model="evaluacion_id" type="text" class="form-control" id="evaluacion_id" placeholder="Evaluacion Id">@error('evaluacion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="seccion_id"></label>
                        <input wire:model="seccion_id" type="text" class="form-control" id="seccion_id" placeholder="Seccion Id">@error('seccion_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pregunta_id"></label>
                        <input wire:model="pregunta_id" type="text" class="form-control" id="pregunta_id" placeholder="Pregunta Id">@error('pregunta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="respuesta"></label>
                        <input wire:model="respuesta" type="text" class="form-control" id="respuesta" placeholder="Respuesta">@error('respuesta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cif"></label>
                        <input wire:model="cif" type="text" class="form-control" id="cif" placeholder="Cif">@error('cif') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
