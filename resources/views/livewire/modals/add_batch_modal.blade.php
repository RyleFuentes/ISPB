<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBatch" tabindex="-1" aria-labelledby="addBatchLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            @include('livewire.messages.message')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addBatchLabel">ADD NEW BATCH FOR THIS PRODUCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='add_batch({{$product->product_id}})'>

                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" placeholder="..." id="quantity"
                            wire:model='batch_form.quantity'>
                        <label for="quantity">Quantity</label>
                    </div>
                    @error('batch_form.quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="date" class="form-control" placeholder="..." id="exp_date"
                            wire:model='batch_form.expiration_date'>
                        <label for="exp_date">Expiration Date</label>
                    </div>
                    @error('batch_form.expiration_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group mt-4">
                      <button type="submit" class="btn btn-primary">Add product</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>


            </div>
            


        </div>
    </div>
</div>
