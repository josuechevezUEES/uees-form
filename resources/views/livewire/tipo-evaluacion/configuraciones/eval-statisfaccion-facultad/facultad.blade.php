<div class="card" wire:ignore.self>
    <div class="card-header bg-navy">
        <h3 class="card-title">
            Facultades
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
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item disabled">
                        Facultades,
                        (De {{ $facultades->count() }} Facultades / {{  count($facultades_seleccionadas) }} Seleccionadas)
                    </li>
                    @forelse ($facultades as $facultad)
                        <li class="list-group-item">
                            <input wire:model="facultades_seleccionadas" value="{{ $facultad->CARCOD }}"
                                id="checkbox{{ $facultad->CARDSC }}" type="checkbox" class="form-check-input">
                            <label for="checkbox{{ $facultad->CARDSC }}">
                                {{ $facultad->CARDSC }}
                            </label>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
</div>
