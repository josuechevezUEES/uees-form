<div class="form-group">
    <label for="tipo_evaluacion_id">Tipos Evaluaciones</label>
    <select wire:model="tipo_evaluacion_id" id="tipo_evaluacion_id" class="form-control form-select">
        <option value="">--seleccionar--</option>
        @forelse ($tipos_evaluaciones as $tipo)
            <option value="{{ $tipo->id }}">
                {{ $tipo->nombre }}
            </option>
        @empty
            <option value="">
                Datos no encontrados
            </option>
        @endforelse
    </select>
    @error('tipo_evaluacion_id')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="instrumento_id">Instrumentos</label>
    <select wire:model="instrumento_id" id="instrumento_id" class="form-control form-select">
        <option value="">--seleccionar--</option>
        @forelse ($lista_instrumentos as $instrumento)
            <option value="{{ $instrumento->id }}">
                {{ $instrumento->nombre }}
            </option>
        @empty
            <option value="">
                Datos no encontrados
            </option>
        @endforelse
    </select>
    @error('instrumento_id')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="fecha_inicio_evaluacion">Fecha Inicio</label>
            <input wire:model="fecha_inicio_evaluacion" type="datetime-local" class="form-control"
                id="fecha_inicio_evaluacion" placeholder="Fecha Inicio Evaluacion">
            @error('fecha_inicio_evaluacion')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="fecha_fin_evaluacion">Fecha Fin</label>
            <input wire:model="fecha_fin_evaluacion" type="datetime-local" class="form-control"
                id="fecha_fin_evaluacion" placeholder="Fecha Fin Evaluacion">
            @error('fecha_fin_evaluacion')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <select wire:model='estado' class="form-select form-control">
        <option value="">--Seleccionar</option>
        <option value="1">Activo</option>
        <option value="0">Desactivo</option>
    </select>
    @error('estado')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>
