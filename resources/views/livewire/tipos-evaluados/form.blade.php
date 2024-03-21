<div class="form-group">
    <label for="nombre">Nombre</label>
    <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
    @error('nombre')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">
    @error('descripcion')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
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
