<div class="mb-4">
    <h3>
        {{ $seccion->literal }}.{{ $pregunta->sub_numeral }})
        {{ $pregunta->nombre }}
        @if ($pregunta->requerido)
            <span class="text-danger">*</span>
        @endif
    </h3>
    <div class="row pt-3">
        @if (isset($pregunta->opciones))
            @forelse ($pregunta->opciones as $opcion)
                @if ($loop->iteration == 1)
                    <div class="col-sm-12">
                        <input type="{{ $opcion['entrada'] }}" name="pregunta-{{ $pregunta->id }}"
                            id="pregunta-{{ $pregunta->id }}" class="form-control form-control-border border-width-2"
                            {{ $pregunta->requerido ? 'required' : null }} value=""
                            wire:model="comentario"
                            placeholder="{{ $opcion['nombre'] }}">
                        <input type="number" name="opcion-{{ $opcion['id'] }}" id="opcion-{{ $opcion['id'] }}"
                            class="d-none" value="{{ $opcion['id'] }}">

                    </div>
                @else
                    <div class="col-sm-12">
                        <input type="{{ $opcion['entrada'] }}" name="pregunta-{{ $pregunta->id }}"
                            id="pregunta-{{ $pregunta->id }}" class="form-control form-control-border border-width-2"
                            {{ $pregunta->requerido ? 'required' : null }} value=""
                            wire:model="comentario"
                            placeholder="{{ $opcion['nombre'] }}">

                        <input type="number" name="opcion-{{ $opcion['id'] }}" id="opcion-{{ $opcion['id'] }}"
                            class="d-none" value="{{ $opcion['id'] }}">
                    </div>
                @endif
            @empty
            @endforelse
        @endif
    </div>
</div>
