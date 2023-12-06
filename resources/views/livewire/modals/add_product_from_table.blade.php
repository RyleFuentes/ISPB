<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addProductTable" tabindex="-1" aria-labelledby="addProductTableLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            @include('livewire.messages.message')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductTableLabel">ADD NEW PRODUCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='add_table_product'>
                    <div class="form-group mt-2">
                        <select class="form-select" aria-label="Default select example"
                            wire:model="table_product_form.brand">
                            <option selected class="form-control">===Choose from existing brands====</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                        <label for="brand">Brand</label>
                    </div>
                    @error('table_product_form.brand')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="prod_name"
                            wire:model='table_product_form.prod_name'>
                        <label for="prod_name">Product Name</label>
                    </div>
                    @error('table_product_form.prod_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" placeholder="..." id="quantity"
                            wire:model='table_product_form.quantity'>
                        <label for="quantity">Quantity</label>
                    </div>
                    @error('table_product_form.quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="kilo"
                            wire:model='table_product_form.kilo' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places." >
                        <label for="kilo">Kilo</label>
                    </div>
                    @error('table_product_form.kilo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="retail"
                            wire:model='table_product_form.retail' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places." >
                        <label for="retail">Retail Price</label>
                    </div>
                    @error('table_product_form.retail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="wholesale"
                            wire:model='table_product_form.wholesale' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places." > 
                            <label for="wholesale">Wholesale price</label>
                    </div>
                    @error('table_product_form.wholesale')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="date" class="form-control" placeholder="..." id="exp_date"
                            wire:model='table_product_form.expiration_date'  >
                            <label for="exp_date">Expiration Date</label>
                    </div>
                    @error('table_product_form.expiration_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Add product</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>


            </div>



        </div>
    </div>
</div>
