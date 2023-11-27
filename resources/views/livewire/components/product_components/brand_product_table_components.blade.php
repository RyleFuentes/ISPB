
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
                <th>batches</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($brand->products as $item)
                <tr wire:key='{{$item->product_id}}'>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->total_quantity}}</td>
                    <td>{{$item->retail_price}}</td>
                    <td>{{$item->wholesale_price}}</td>
                    <td>
                        <button wire:click='view_product_info({{ $item->product_id }})' class="btn"><i
                                class="bi bi-eye-fill text-primary"></i>Product Batches</button>
                       
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>


    @include('livewire.modals.add_product_modal')
</div>
