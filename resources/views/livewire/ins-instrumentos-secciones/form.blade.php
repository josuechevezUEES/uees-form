<div class="form-group">
    <label for="instrumento_id">Instrumento ID</label>
    <input wire:model="instrumento_id" type="text" class="form-control" id="instrumento_id" placeholder="Instrumento Id">
    @error('instrumento_id')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
    @error('nombre')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="literal">Literal</label>
    <input wire:model="literal" type="number" class="form-control" id="literal" placeholder="Literal">
    @error('literal')
        <span class="error text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group" wire:ignore>
    <label for="fondo">Fondo</label>
    <input type="file" wire:model="fondo" class="form-control">
    <div wire:loading wire:target="photo">Uploading...</div>
    @error('fondo')
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
