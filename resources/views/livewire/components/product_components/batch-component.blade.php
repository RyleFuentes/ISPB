<div wire:poll>
    <div class="p-3 d-flex justify-content-end">
        <button class="btn btn-light rounded-pill me-2 btn-sm" wire:click='toggle_card'>
            <i class="bi bi-table text-primary"></i> products page</button>

            
    </div>

    <div class="rounded p-3 mt-3 bg-white shadow-sm">
        <div class="d-flex align-items-center justify-content-between">

            
            <div class="d-flex flex-column mb-5 justify-content-between">
                <h3 class="fw-50 fs-30 mb-5">{{$product->product_name}} BATCHES</h3>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBatch">Add new product</button>
            </div>

            <div>
                <form action="" class="form d-flex">
                    <div class="form-floating">
                        <input wire:model.live='search' placeholder="..." id="search" type="text" class="form-control">
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
                    <tr wire:key='{{$batch->batch_id}}'>
                        <td>{{$batch->batch_id}}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $batch->quantity }}</td>
                        <td>{{ $batch->expiration_date }}</td>
                       
                       
                        <td>
                            <button wire:click='view_product_info' class="btn"><i class="bi bi-eye-fill text-primary"></i></button>
                            <button class="btn"><i class="bi bi-pencil-fill text-success"></i></button>
                            <button wire:click='delete_product({{$product->product_id}})' class="btn"><i class="bi bi-trash3-fill text-danger"></i></button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>


        <div class="mt-3 p-3">

            {{ $products->links() }}
        </div>



        @include('livewire.modals.add_batch_modal')

    </div>

</div>
