<div>

    <div class="p-3 d-flex justify-content-end">
        <button class="btn btn-primary rounded-pill me-2 btn-sm" wire:click='toggle_card'>
            <i class="bi bi-table text-primary"></i> Brand view</button>


    </div>


    <div class="rounded p-3 mt-3 bg-white shadow-sm">
        <div class="mb-3 p-3">
            <button class="btn btn-primary rounded-pill me-2 btn-sm" data-bs-toggle="modal"
                data-bs-target="#addProductTable">
                <i class="bi bi-plus-circle-fill text-light"></i> Add new product</button>
        </div>
        <div class="d-flex align-items-center justify-content-between">

            <h3 class="fw-50 fs-30 mb-5">PRODUCTS LIST</h3>


            <div>
                <form action="" class="form d-flex">
                    <div class="form-floating">
                        <input wire:model.live='search' placeholder="..." id="search" type="search"
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
                    <th>Kilos </th>
                    <th>retail price</th>
                    <th>wholesale price</th>

                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($products as $product)
                    <tr wire:key='{{ $product->product_id }}'>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->total_quantity }}</td>

                        @if ($edit_kilo == true && $kilo_id == $product->product_id)
                            <td>

                                <input type="text" wire:model='kilo_val' class="form-control">
                                @error('kilo_val')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button wire:click='update_kilo' class="btn">save</button>
                                <button wire:click='unset_edit_kilo' class="btn btn-sm">
                                    <i class="bi bi-x-circle"></i>
                                </button>


                            </td>
                        @else
                            <td>{{ $product->kilo }} <button wire:click='set_edit_kilo({{ $product->product_id }})'
                                    class="btn btn-sm"><i class="bi bi-vector-pen text-primary"></i></button></td>
                        @endif




                        <td>₱ {{ $product->retail_price }}</td>
                        <td>₱ {{ $product->wholesale_price }}</td>


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
