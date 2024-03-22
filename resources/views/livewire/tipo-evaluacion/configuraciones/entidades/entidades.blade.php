<div class="row">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header bg-navy">
                Entidades
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="evaluador_id">¿Quienes seran los evaluadores?</label>
                            <select id="evaluador_id" wire:model='evaluador_id' class="form-control">
                                <option>--seleccionar--</option>
                                @forelse ($evaluadores as $evaluador)
                                    <option value="{{ $evaluador->id }}">{{ $evaluador->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="evaluado_id">¿Quienes seran los evaluados?</label>
                            <select id="evaluado_id" wire:model='evaluado_id' class="form-control">
                                <option>--seleccionar--</option>
                                @forelse ($evaluados as $evaluado)
                                    <option value="{{ $evaluado->id }}">{{ $evaluado->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <button wire:click="guardar_configuracion()" type="button" class="btn btn-sm btn-warning">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
