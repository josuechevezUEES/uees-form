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
                    <div class="col-sm-auto">
                        <input type="{{ $opcion->entrada }}" name="pregunta-{{ $pregunta->id }}"
                            id="pregunta-{{ $pregunta->id }}" wire:click="seleccionarOpcion({{ $opcion->id }})"
                            {{ $pregunta->requerido ? 'required' : null }} value="{{ $opcion->id }}"
                            class="form-radio-input">
                        <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                            {{ $opcion->nombre }}
                        </label>
                    </div>
                @else
                    <div class="col-sm-auto">
                        <input type="{{ $opcion->entrada }}" name="pregunta-{{ $pregunta->id }}"
                            id="pregunta-{{ $pregunta->id }}" wire:click="seleccionarOpcion({{ $opcion->id }})"
                            {{ $pregunta->requerido ? 'required' : null }} value="{{ $opcion->id }}"
                            class="form-radio-input">
                        <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop->iteration }}">
                            {{ $opcion->nombre }}
                        </label>
                    </div>
                @endif
            @empty
            @endforelse
        @endif
    </div>
    <div class="{{ $habilitar_comentario ? '' : 'd-none' }}">
        @if ($habilitar_comentario == true)
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <textarea id="comentario-{{ $loop }}" name="comentario-{{ $loop }}" wire:model='comentario'
                            {{ $pregunta->requerido ? 'required' : null }} placeholder="{{ $pregunta->preguntaComentario->comentario }}"
                            class="form-control form-control-sm form-control-border"></textarea>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
