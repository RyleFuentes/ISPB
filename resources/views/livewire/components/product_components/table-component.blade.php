<div>
    
    <div class="p-3 d-flex justify-content-end">
        <button class="btn btn-light rounded-pill me-2 btn-sm" wire:click='toggle_card'>
            <i class="bi bi-table text-primary"></i> Card view</button>

       
    </div>

   
        <div class="rounded p-3 mt-3 bg-white shadow-sm">
            <div class="mb-3 p-3">
                <button class="btn btn-primary rounded-pill" wire:click='add_brand_mode_on'>add new brand</button>
                <button class="btn btn-primary rounded-pill me-2 btn-sm" data-bs-toggle="modal" data-bs-target="#addProductTable">
                    <i class="bi bi-plus-circle-fill text-light"></i> Add new product</button>
            </div>
            <div class="d-flex align-items-center justify-content-between">

                <h3 class="fw-50 fs-30 mb-5">PRODUCTS LIST</h3>


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
                        <th>Brand</th>
                        <th>Product</th>
                        <th>Quantity (bags) </th>

                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($products as $product)
                        <tr wire:key='{{ $product->product_id }}'>
                            <td>{{ $product->brand->brand_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->total_quantity }}</td>


                            <td>
                                <button wire:click='view_product_info({{ $product->product_id }})' class="btn"><i
                                        class="bi bi-eye-fill text-primary"></i>Product Batches</button>
                               
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>


            <div class="mt-3 p-3">

                {{ $products->links() }}
            </div>




        </div>
        @include('livewire.modals.add_product_from_table')


</div>
