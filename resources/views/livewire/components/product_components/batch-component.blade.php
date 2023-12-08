<div>
    <div class="p-3 d-flex justify-content-end">
        <button class="btn btn-light rounded-pill me-2 btn-sm" wire:click='unview_product_info'>
            <i class="bi bi-table text-primary"></i>
            < Go back</button>


    </div>

    <div class="rounded p-3 mt-3 bg-white shadow-sm">
        <div class="d-flex align-items-center justify-content-between">


            <div class="d-flex flex-column mb-5 justify-content-between">
                <h3 class="fw-50 fs-30 mb-5">{{ $product->product_name }} BATCHES</h3>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBatch">Add new batch</button>
            </div>

            <div>
                <form action="" class="form d-flex">
                    <div class="form-floating">
                        <input wire:model.live='search' placeholder="..." id="search" type="text"
                            class="form-control">
                        <label for="search">Search...</label>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Batch #</th>
                    <th>Product</th>
                    <th>Quantity (bags) </th>
                    <th>Expiration Date</th>

                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($product->batch as $batch)
                    @if ($editing_mode == true && $batch->batch_id == $set_id)
                        <tr wire:key='{{ $batch->batch_id }}'>
                            <td>{{ $batch->batch_id }}</td>
                            <td>{{ $batch->product->product_name }}</td>
                            <td>
                                <input type="number" class="form-control" wire:model='edit_form_batch.quantity'>
                                @error('edit_form_batch.quantity')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="date" class="form-control" wire:model='edit_form_batch.exp_date'>
                                @error('edit_form_batch.exp_date')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>


                            <td>
                                <button wire:click='update_batch_form({{ $batch->batch_id }})'
                                    class="btn">update</button>
                                <button wire:click='cancel_edit' class="btn">cancel</button>
                            </td>
                        </tr>
                    @else
                        <tr wire:key='{{ $batch->batch_id }}'>
                            <td>{{ $batch->batch_id }}</td>
                            <td>{{ $batch->product->product_name }}</td>
                            <td>{{ $batch->quantity }}</td>
                            <td>{{ $batch->expiration_date }}</td>


                            <td>
                                <button wire:click='set_edit_batch({{ $batch->batch_id }})' class="btn"><i
                                        class="bi bi-pencil-fill text-success"></i></button>
                                <button wire:click='delete_batch({{ $batch->batch_id }})' class="btn"><i
                                        class="bi bi-trash3-fill text-danger"></i></button>
                            </td>
                        </tr>
                    @endif
                @endforeach


            </tbody>
        </table>


        <div class="mt-3 p-3">
            {{ $product->batch()->paginate(10)->links() }}

        </div>



        @include('livewire.modals.add_batch_modal')

    </div>

</div>
