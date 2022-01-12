<h2>editar Post</h2>
<!-- incluir vista del formulario-->
@include('livewire.form')

<button wire:click="update" class="btn btn-primary">
    Actualizar
</button>

<button wire:click="default" class="btn btn-link">
    Cancelar
</button>