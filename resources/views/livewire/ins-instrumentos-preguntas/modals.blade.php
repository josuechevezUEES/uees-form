<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Ins Instrumentos Pregunta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="cuestionario_id"></label>
                        <input wire:model="cuestionario_id" type="text" class="form-control" id="cuestionario_id" placeholder="Cuestionario Id">@error('cuestionario_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_pregunta_id"></label>
                        <input wire:model="tipo_pregunta_id" type="text" class="form-control" id="tipo_pregunta_id" placeholder="Tipo Pregunta Id">@error('tipo_pregunta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_numeral"></label>
                        <input wire:model="sub_numeral" type="text" class="form-control" id="sub_numeral" placeholder="Sub Numeral">@error('sub_numeral') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="requerido"></label>
                        <input wire:model="requerido" type="text" class="form-control" id="requerido" placeholder="Requerido">@error('requerido') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Ins Instrumentos Pregunta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="cuestionario_id"></label>
                        <input wire:model="cuestionario_id" type="text" class="form-control" id="cuestionario_id" placeholder="Cuestionario Id">@error('cuestionario_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_pregunta_id"></label>
                        <input wire:model="tipo_pregunta_id" type="text" class="form-control" id="tipo_pregunta_id" placeholder="Tipo Pregunta Id">@error('tipo_pregunta_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_numeral"></label>
                        <input wire:model="sub_numeral" type="text" class="form-control" id="sub_numeral" placeholder="Sub Numeral">@error('sub_numeral') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="requerido"></label>
                        <input wire:model="requerido" type="text" class="form-control" id="requerido" placeholder="Requerido">@error('requerido') <span class="error text-danger">{{ $message }}</span> @enderror
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
