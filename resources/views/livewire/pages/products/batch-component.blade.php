<div>
    <div class="px-5 d-flex justify-content-between">
        <h3 class="fs-5">Batches for {{ $product->product_name }}</h3>

        <button class="btn btn-outline-dark rounded-4 rounded-3 py-2 px-3 btn-sm" wire:click='unview_product_info'>
            <i class="fa-sharp fa-solid fa-arrow-left"></i> Go Back
        </button>

    </div>


    <div class="rounded p-3 mt-3 bg-white shadow-sm">
        <div class="px-4 d-flex align-items-center justify-content-between">
            <div>
                <form action="" class="form">
                    <div class="d-flex justify-content-center align-items-center">
                        <input wire:model.live='search' placeholder="Search" id="search" type="search"
                            class="form-control border-secondary rounded-3">
                        <button class="">
                            <i class="ms-3 fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="p-3">
                <button class="btn btn-primary rounded-3 py-2 px-3 me-2 btn-sm" data-bs-toggle="modal"
                    data-bs-target="#addBatch">
                    <i class="fa-sharp fa-solid fa-circle-plus"></i> Add new batch</button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Batch #</th>
                    <th>Product</th>
                    <th>Quantity (bags) </th>
                    <th>Expiration Date</th>
                    <th>Actions</th>
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
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="date" class="form-control" wire:model='edit_form_batch.exp_date'>
                                @error('edit_form_batch.exp_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>


                            <td>
                                <button wire:click='update_batch_form({{ $batch->batch_id }})'
                                    class="btn btn-primary">Update</button>
                                <button wire:click='cancel_edit' class="btn btn-secondary">Cancel</button>
                            </td>
                        </tr>
                    @else
                        <tr wire:key='{{ $batch->batch_id }}'>
                            <td>{{ $batch->batch_id }}</td>
                            <td>{{ $batch->product->product_name }}</td>
                            <td>{{ $batch->quantity }}</td>
                            <td>{{ $batch->expiration_date }}</td>


                            <td>
                                <div class="dropstart">
                                    <button class="dropdown-toggle action" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" style="width: 250px; font-size: 13px">
                                        <li wire:click='set_edit_batch({{ $batch->batch_id }})'>
                                            <i class="fas fa-edit"></i>
                                            Edit Batch
                                        </li>
                                        <li wire:click='delete_batch({{ $batch->batch_id }})' class="mt-2"
                                            style="cursor: pointer">
                                            <i class="fas fa-trash"></i>
                                            Delete Batch
                                        </li>
                                    </ul>
                                </div>
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
