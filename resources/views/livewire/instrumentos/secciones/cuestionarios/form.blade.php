<div class="px-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="cuestionario_id">Cuestionario</label>
                <input wire:model="cuestionario_id" type="text" class="form-control" id="cuestionario_id"
                    placeholder="Cuestionario Id" disabled>
                @error('cuestionario_id')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="sub_numeral">Sub.Numeral</label>
                <input wire:model="sub_numeral" type="number" disabled class="form-control form-control-border border-width-2" id="sub_numeral"
                    placeholder="Sub Numeral">
                @error('sub_numeral')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group pb-3">
        <label for="nombre">Titulo Pregunta</label>
        <input wire:model="nombre" type="text" class="form-control form-control-border border-width-2" id="nombre" placeholder="Ingresa Nombre">
        @error('nombre')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group pb-3">
        <label for="requerido">Obligatorio</label>
        <select wire:model="requerido" id="requerido" class="form-select form-control form-control-border border-width-2">
            <option value="">--seleccionar--</option>
            <option value="1">Si, Hacer Obigatorio</option>
            <option value="0">No Hacer Obigatorio</option>
        </select>
        @error('requerido')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group pb-3">
        <label for="tipo_pregunta_id">Tipo Pregunta</label>
        <select wire:model="tipo_pregunta_id" id="tipo_pregunta_id" class="form-control form-select form-control-border border-width-2">
            <option value="">--seleccionar--</option>
            @forelse ($tipos_preguntas as $row)
                <option value="{{ $row->id }}">
                    {{ $row->nombre }}
                </option>
            @empty
            @endforelse
        </select>
        @error('tipo_pregunta_id')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
