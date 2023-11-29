<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD BRAND</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('livewire.messages.message')
                <form wire:submit='addBrand'>
                    <div class="form-floating">
                        <input type="text" placeholder="..." wire:model='brand' class="form-control" id="brand">
                        <label for="brand">Brand</label>
                    </div>

                    @error('brand')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">add new brand</button>
                </form>
            </div>
        </div>
    </div>
</div>