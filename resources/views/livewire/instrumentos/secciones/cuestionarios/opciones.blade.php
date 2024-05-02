<div class="row px-5">
    <div class="col-sm-12 mb-5">
        @switch($tipo_pregunta_id)
            @case('1')
                <label for="nombre_opcion">Nombre Opcion</label>
            @break

            @case('2')
                <label for="nombre_opcion">Ingresa la macara de la entrada</label>
            @break

            @case('3')
                <label for="nombre_opcion">Nombre Opcion</label>
            @break

            @case('4')
                <label for="nombre_opcion">Nombre Opcion</label>
            @break

            @default
        @endswitch

        <div class="input-group">
            <input type="text" wire:model="nombre_opcion" id="nombre_opcion"
                placeholder="Ingresar nuevo nombre para la opcion"
                class="form-control form-control-border border-width-2">
            <div class="input-group-append">
                <button type="button" wire:click='agregar_opcion()' class="btn btn-sm btn-primary">Agregrar </button>
            </div>
        </div>

        @error('nombre_opcion')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    @if ($tipo_pregunta_id == '4')
        <div class="col-sm-12 pb-3">
            <label for="comentario">Titulo de comentario</label>
            <input type="text" wire:model="comentario" id="comentario"
                class="form-control form-control-border border-width-2"
                placeholder="Este titulo se mostrara arriba de la entrada">
            <small id="comentarioHelp" class="form-text text-muted">
                Solo se puede agregar un comentario por pregunta
            </small>
            @error('comentario')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    @endif
</div>
