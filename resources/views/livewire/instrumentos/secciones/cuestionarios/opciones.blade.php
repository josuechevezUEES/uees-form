<div class="row px-5">
    <div class="col-sm-12 pb-3">
        @switch($tipo_pregunta_id)
            @case('1')
                <label for="nombre_opcion">Nombre Pregunta</label>
            @break

            @case('2')
                <label for="nombre_opcion">Ingresa la macara de la entrada</label>
            @break

            @case('3')
                <label for="nombre_opcion">Nombre Pregunta</label>
            @break

            @case('4')
                <label for="nombre_opcion">Nombre Pregunta</label>
            @break

            @default
        @endswitch

        <input type="text" wire:model="nombre_opcion" id="nombre_opcion"
            class="form-control form-control-border border-width-2">
    </div>

    @if ($tipo_pregunta_id == '4')
        <div class="col-sm-12 pb-3">
            <label for="comentario">Titulo de comentario</label>
            <input type="text" wire:model="comentario" id="comentario"
                class="form-control form-control-border border-width-2"
                placeholder="Este titulo se mostrara arriba de la entrada">
        </div>
    @endif

    <div class="col-sm-12 mb-3">
        <button type="button" wire:click='agregar_opcion()' class="btn btn-sm btn-primary">Agregrar </button>
    </div>
</div>
