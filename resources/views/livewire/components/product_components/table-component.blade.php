<div>
    <div class="p-3 d-flex justify-content-end">
        <button class="btn btn-light rounded-pill me-2 btn-sm" wire:click='toggle_card'>
            <i class="bi bi-table text-primary"></i> Card view</button>
    </div>

    <div class="rounded p-3 mt-3 bg-white shadow-sm">
        <div class="d-flex align-items-center justify-content-between">

            <h3 class="fw-50 fs-30 mb-5">PRODUCTS LIST</h3>


            <div>
                <form action="" class="form d-flex">
                    <input wire:model.live='search' type="text" class="form-control">

                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Product</th>
                    <th>Quantity (bags) </th>
                </tr>
            </thead>

            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>


        <div class="mt-3 p-3">

            {{ $products->links() }}
        </div>




    </div>

</div>
