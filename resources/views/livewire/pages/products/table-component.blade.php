<div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary rounded-3 me-2 rounded-3 py-2 px-3 btn-sm" wire:click='toggle_card'>
            <i class="bi bi-table text-light"></i> View Brands</button>
    </div>

    <div class="rounded mt-3 bg-white shadow-sm">
        <div class="px-4 py-3 d-flex align-items-center justify-content-between">
            <div class="flex gap-4">
                <form action="" class="form">
                    <div class="d-flex justify-content-center align-items-center">
                        <input wire:model.live='search' placeholder="Search" id="search" type="search"
                            class="form-control border-secondary rounded-3">
                        <button class="">
                            <i class="ms-3 fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                
                <button class="btn btn-primary rounded-circle fs-5 shadow me-2 btn-sm" wire:click='generateProductPdf'>
                    <i class="bi bi-filetype-pdf"></i>
                </button>
            </div>

            <div class="p-3">

                <button class="btn btn-primary rounded-3 py-2 px-3 me-2 btn-sm" data-bs-toggle="modal"
                    data-bs-target="#addProductTable">
                    <i class="fa-sharp fa-solid fa-circle-plus"></i> Add Product</button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Product</th>
                    <th>Quantity </th>
                    <th>Retail price</th>
                    <th>Wholesale price</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($products as $product)
                    <tr wire:key='{{ $product->product_id }}'>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->total_quantity }} <span class="text-green-700">bags</span></td>
                        <td>₱ {{ $product->retail_price }}</td>
                        <td>₱ {{ $product->wholesale_price }}</td>
                        <td>

                            <button class="btn btn-primary" wire:click='view_product_info({{ $product->product_id }})'>
                                <i class="fa-solid fa-eye"></i> View Product Batches
                            </button>
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

    @include('livewire.pages.products.generate_report_modal')


</div>
