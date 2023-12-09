<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBatch" tabindex="-1" aria-labelledby="addBatchLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">

            @include('livewire.messages.message')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addBatchLabel">Add New Batch for {{ $product->product_name }} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form wire:submit.prevent='add_batch({{ $product->product_id }})'>

                    <div class="mt-2">
                        <label for="quantity" class="modal-input-label">Quantity</label>
                        <input type="number" class="modal-input-field form-control" placeholder="Enter Quantity"
                            id="quantity" wire:model='batch_form.quantity'>
                    </div>
                    @error('batch_form.quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class=" mt-2">
                        <label for="exp_date" class="modal-input-label">Expiration Date</label>
                        <input type="date" class="modal-input-field form-control" placeholder="..." id="exp_date"
                            wire:model='batch_form.expiration_date'>
                    </div>
                    @error('batch_form.expiration_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-5" style="font-size: 12px">
                            <i class="fa-sharp fa-solid fa-plus"></i> Add Batch</button></button>
                        </button>
                        <button type="button" class="btn btn-outline-secondary px-5" data-bs-dismiss="modal"
                            style="font-size: 12px">Close</button>
                    </div>
                </form>


            </div>



        </div>
    </div>
</div>
