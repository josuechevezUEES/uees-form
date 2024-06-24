<div class="card" wire:ignore.self>
    <div class="card-header bg-dark-blue text-light">
        <h3 class="card-title">
            Facultades,
            (De {{ $contador_facultades }} Facultades / {{ count($facultades_seleccionadas) }}
            Seleccionadas)
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
        <div wire:loading.delay wire:target='facultades_seleccionadas,agregrar_facultad,eliminar_facultad'>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            Procesando, porfavor espere...
        </div>
        <div class="row p-3">
            @forelse ($facultades as $facultad)
                <div class="col-sm-4 mb-3 ">
                    <input wire:model="facultades_seleccionadas" value="{{ $facultad->CARCOD }}"
                        id="checkbox{{ $facultad->CARDSC }}" type="checkbox"
                        class="form-check-input form-check-input-facultades"
                        wire:target='facultades_seleccionadas,agregrar_facultad, eliminar_facultad'
                        wire:loading.attr="disabled">
                    <label for="checkbox{{ $facultad->CARDSC }}">
                        {{ $facultad->CARDSC }}
                    </label>
                </div>
            @empty
            @endforelse
        </div>
        <div class="float-end">{{ $facultades->links() }}</div>
    </div>
    <div class="card-footer">
        <p class="text-muted">
            ¿Para que sirven las facultades?
            <br>
            Las facultades seleccionadas seran la que participaran
            en la evaluacion, las que no esten seleccionada no podran participar.
        </p>
    </div>
</div>

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.form-check-input-facultades');

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
@endsection
