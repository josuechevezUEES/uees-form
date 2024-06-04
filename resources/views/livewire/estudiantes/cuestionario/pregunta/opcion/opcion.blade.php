<div>
    <input type="{{ $opcion->entrada }}" name="pregunta-{{ $pregunta->id }}" id="pregunta-{{ $pregunta->id }}"
        wire:click="seleccionarOpcion({{ $opcion->id }})" {{ $pregunta->requerido ? 'required' : null }}
        value="{{ $opcion->id }}" class="form-radio-input">
    <label for="{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}.{{ $loop }}">
        {{ $opcion->nombre }}
    </label>
</div>
