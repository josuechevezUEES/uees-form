@if ($activar_edicion == true)
    <div class="border border-dark px-3 pt-3 pb-3 rounded">
        <div class="input-group">
            <input type="text" name="nombre_opcion" id="nombre_opcion" wire:model='nombre_opcion'
                placeholder="Nuevo Nombre Opcion" class="form-control form-control-sm form-control-border">
            <div class="input-group-append">
                <button type="button" class="btn btn-sm" wire:click='desactivar_edicion'>
                    <i class="fas fa-save"></i>
                    <div wire:loading.delay wire:target='desactivar_edicion' class="px-1">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
@else
    <div class="border border-dark px-3 pt-3 rounded">
        <div class="form-group form-check">
            <input type="{{ $opcion['entrada'] }}" class="form-check-input" id="check{{ $opcion['nombre'] }}"
                wire:model="nombre_opcion" {{ $pregunta->requerido ? 'required' : null }}
                value="{{ $opcion['nombre'] }}" wire:ignore>

            <label class="form-check-label" wire:ignore>
                {{ $opcion['nombre'] }}
                <button type="button" class="btn btn-sm" wire:click='activar_edicion'>
                    <i class="fas fa-pencil-alt"></i>
                    <div wire:loading.delay wire:target='activar_edicion'>
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </button>
                <button type="button" class="btn btn-sm" wire:click="eliminar_opcion">
                    <i class="fas fa-trash-alt"></i>
                    <div wire:loading.delay wire:target='eliminar_opcion' class="px-1">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </button>
            </label>
        </div>
    </div>
@endif
