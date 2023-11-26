
<button class="btn btn-light" wire:click='table_mode'>back</button>
<div class="mt-3 rounded bg-white p-3 shadow-sm">

    <div class="d-flex mb-5 justify-content-between">
        <h3 class="fs-30 fw-50">{{$brand->brand_name}}</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">Add new product</button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Retail Price</th>
                <th>Wholesale Price</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($brand->products as $item)
                <tr >
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->total_quantity}}</td>
                    <td>{{$item->retail_price}}</td>
                    <td>{{$item->wholesale_price}}</td>
                </tr>
            @endforeach



        </tbody>
    </table>


    @include('livewire.modals.add_product_modal')
</div>
