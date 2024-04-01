<div class="row">
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header bg-navy">
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
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3">
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
                    <div class="col-sm-6 mb-3">
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
                    @if ($evaluado_id == '3' && $evaluador_id == '3')
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="modalidades">¿Que modalidades podran evaluar?</label>
                                <div class="row">
                                    @forelse ($lista_modalidades as $modalidad)
                                        <div class="col-sm-4">
                                            <div class="form-group form-check">
                                                <input type="checkbox"
                                                    class="form-check-input form-check-input-modalidades"
                                                    id="check{{ $modalidad['id'] }}" value="{{ $modalidad['id'] }}">
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
                        <button wire:click="guardar_configuracion()" type="button" class="btn btn-sm btn-warning">
                            Guardar Cambios
                        </button>
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
                        Livewire.emit('agregrar_facultad', e.target.value)
                    } else {
                        Livewire.emit('eliminar_facultad', e.target.value)
                    }
                });
            });
        });
    </script>
@endpush
