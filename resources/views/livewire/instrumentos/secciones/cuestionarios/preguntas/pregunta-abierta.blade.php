<div class="row mb-3">
    <div class="col-sm-12">
        @if ($activar_edicion == true)
            <div class="input-group">
                <input type="text" name="nombre_pregunta" id="nombre_pregunta" wire:model='nombre_pregunta'
                    placeholder="Nueva Preguntas" class="form-control form-control-border">

                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-dark" wire:click='desactivar_edicion'>
                        <i class="fas fa-save"></i>
                        <div wire:loading.delay wire:target='desactivar_edicion'>
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </button>
                </div>

            </div>
        @else
            <h3>
                {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
                {{ $pregunta->nombre }}
                <button type="button" class="btn btn-sm btn-outline-dark" wire:click='activar_edicion'>
                    <i class="fas fa-pencil-alt"></i>
                    <div wire:loading.delay wire:target='activar_edicion'>
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </button>
            </h3>
            <textarea name="comentario-{{ $pregunta->id }}" id="comentario-{{ $pregunta->id }}" class="form-control form-control-border" placeholder="Ingresar tu comentario"></textarea>
        @endif
    </div>
</div>
