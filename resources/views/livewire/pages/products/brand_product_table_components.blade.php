<button class="btn btn-light" wire:click='table_mode'>back</button>
<div class="mt-3 rounded bg-white p-3 shadow-sm">
    @include('livewire.modals.add_product_modal')
    <div class="d-flex mb-5 justify-content-between">
        <h3 class="fs-30 fw-50">{{ $brand->brand_name }}</h3>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">Add new
            product</button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Kilo</th>
                <th>Retail Price</th>
                <th>Wholesale Price</th>
                <th>actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($brand->products as $item)
                @if ($editing_mode == true && $set_id == $item->product_id)
                    <tr wire:key='{{ $item->product_id }}'>

                        <td>
                            <input type="text" class="form-control" wire:model='editForm.prod_name'>
                            @error('editForm.prod_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>

                        <td>{{ $item->total_quantity }}</td>
                        <td>
                            <input type="text" class="form-control" wire:model='editForm.kilo'
                                pattern="^\d+(\.\d{1,2})?$"
                                title="Please enter a valid number with up to two decimal places.">
                            @error('editForm.kilo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>

                        <td>
                            <input type="text" class="form-control" wire:model='editForm.retail'
                                pattern="^\d+(\.\d{1,2})?$"
                                title="Please enter a valid number with up to two decimal places.">
                            @error('editForm.retail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>

                        <td>
                            <input type="text" class="form-control" wire:model='editForm.wholesale'
                                pattern="^\d+(\.\d{1,2})?$"
                                title="Please enter a valid number with up to two decimal places.">
                            @error('editForm.wholesale')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>

                        <td>
                            <button type="submit" class="btn btn-primary rounded-pill"
                                wire:click='update_edited({{ $item->product_id }})'>update</button>
                            <button class="btn btn-outline-dark"
                                wire:click='cancel_edit({{ $item->product_id }})'>cancel edit</button>

                        </td>

                    </tr>
                @else
                    <tr wire:key='{{ $item->product_id }}'>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->total_quantity }}</td>
                        <td>{{ $item->kilo }}</td>
                        <td>{{ $item->retail_price }}</td>
                        <td>{{ $item->wholesale_price }}</td>
                        <td>
                            <button wire:click='view_product_info({{ $item->product_id }})' class="btn"><i
                                    class="bi bi-eye-fill text-primary"></i>Product Batches</button>
                            <button class="btn btn-outline-dark"
                                wire:click='set_edit({{ $item->product_id }})'>edit</button>
                            <button class="btn btn-danger" wire:click='delete_product({{ $item->product_id }})'>
                                delete
                            </button>

                        </td>





                    </tr>
                @endif
            @endforeach



        </tbody>
    </table>



</div>
