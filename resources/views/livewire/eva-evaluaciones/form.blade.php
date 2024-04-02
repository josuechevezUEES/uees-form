<div class="form-group">
    <label for="tipo_evaluacion_id"></label>
    <input wire:model="tipo_evaluacion_id" type="text" class="form-control" id="tipo_evaluacion_id"
        placeholder="Tipo Evaluacion Id">
    @error('tipo_evaluacion_id')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="instrumento_id"></label>
    <input wire:model="instrumento_id" type="text" class="form-control" id="instrumento_id"
        placeholder="Instrumento Id">
    @error('instrumento_id')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_inicio_evaluacion"></label>
    <input wire:model="fecha_inicio_evaluacion" type="text" class="form-control" id="fecha_inicio_evaluacion"
        placeholder="Fecha Inicio Evaluacion">
    @error('fecha_inicio_evaluacion')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_fin_evaluacion"></label>
    <input wire:model="fecha_fin_evaluacion" type="text" class="form-control" id="fecha_fin_evaluacion"
        placeholder="Fecha Fin Evaluacion">
    @error('fecha_fin_evaluacion')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="estado"></label>
    <input wire:model="estado" type="text" class="form-control" id="estado" placeholder="Estado">
    @error('estado')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>
