<div class="row">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header bg-dark-blue text-light">
                <h3 class="card-title">
                    Las entidades de la evaluacion
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="evaluador_id">¿Quienes seran los evaluadores?</label>
                            <select id="evaluador_id" {{ $configuracion_entidades ? 'disabled' : null }}
                                wire:model='evaluador_id' class="form-control">
                                <option>--seleccionar--</option>
                                @forelse ($evaluadores as $evaluador)
                                    <option value="{{ $evaluador->id }}">{{ $evaluador->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="evaluado_id">¿Quienes seran los evaluados?</label>
                            <select id="evaluado_id" {{ $configuracion_entidades ? 'disabled' : null }}
                                wire:model='evaluado_id' class="form-control">
                                <option>--seleccionar--</option>
                                @forelse ($evaluados as $evaluado)
                                    <option value="{{ $evaluado->id }}">{{ $evaluado->nombre }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    @if ($configuracion_entidades != null && $evaluado_id == '3' && $evaluador_id == '3')
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="modalidades">¿Que modalidades podran evaluar?</label>
                                <div class="row p-2">
                                    @forelse ($lista_modalidades as $modalidad)
                                        <div class="col-sm-4">
                                            <div class="form-group form-check">
                                                <input type="checkbox"
                                                    class="form-check-input form-check-input-modalidades"
                                                    wire:target='modalidades_seleccionadas,agregrar_modalidad, eliminar_modalidad'
                                                    wire:loading.attr="disabled" id="check{{ $modalidad['id'] }}"
                                                    wire:model='modalidades_seleccionadas'
                                                    value="{{ $modalidad['id'] }}">
                                                <label class="form-check-label" for="check{{ $modalidad['id'] }}">
                                                    {{ $modalidad['nombre'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-sm-12">
                                            <p class="text-muted">
                                                No se encontraron modalidades
                                            </p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <button wire:click="guardar_configuracion()" type="button" class="btn btn-sm bg-dark-yellow"
                            wire:target="modalidades_seleccionadas,evaluado_id,evaluador_id"
                            wire:loading.attr="disabled">
                            Guardar Cambios
                        </button>

                        <div wire:loading.delay wire:target='eliminar_modalidad,agregrar_modalidad'>
                            <div class="mt-2">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Procesando, porfavor espere...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-muted">
                    ¿Que son las entidades?
                    <br>
                    Son las personas que evaluaran y seran evaluados para esta
                    evaluacion o configuracion.
                </p>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.form-check-input-modalidades');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('click', function(e) {
                    if (checkbox.checked) {
                        Livewire.emit('agregrar_modalidad', e.target.value)
                    } else {
                        Livewire.emit('eliminar_modalidad', e.target.value)
                    }
                });
            });
        });
    </script>
@endpush
