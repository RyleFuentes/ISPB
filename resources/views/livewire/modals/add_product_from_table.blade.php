<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addProductTable" tabindex="-1" aria-labelledby="addProductTableLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            @include('livewire.messages.message')
            <div class="modal-header">
                <h5 class="modal-title" id="addProductTableLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <form wire:submit.prevent='add_table_product'>
                    <div class="form-group mt-2">
                        <label for="brand" class="modal-input-label">
                            Choose Brand: </label>
                        <select class="modal-input-field form-select" wire:model="table_product_form.brand">
                            <option selected class="form-control" style="font-size: 12px">Select from Existing Brands
                            </option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('table_product_form.brand')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mt-2">
                        <label for="prod_name" class="modal-input-label">Product Name</label>
                        <input type="text" class="modal-input-field form-control" placeholder="Enter Product Name"
                            id="prod_name" wire:model='table_product_form.prod_name'>
                    </div>
                    @error('table_product_form.prod_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mt-2">
                        <label for="product_description" class="modal-input-label">Product Description</label>
                        <textarea class="modal-input-field form-control" placeholder="Leave a product description" id="product_description"
                            wire:model='table_product_form.prod_description'></textarea>
                    </div>
                    @error('table_product_form.prod_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class=" mt-2">
                        <label for="quantity" class="modal-input-label">Quantity</label>

                        <input type="number" class="modal-input-field form-control" placeholder="Enter Quantity"
                            id="quantity" wire:model='table_product_form.quantity'>
                    </div>
                    @error('table_product_form.quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class=" mt-2">
                        <label for="kilo" class="modal-input-label">Kilo</label>
                        <input type="text" class="modal-input-field form-control" placeholder="Enter Kilo"
                            id="kilo" wire:model='table_product_form.kilo' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places.">
                    </div>
                    @error('table_product_form.kilo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mt-2">
                        <label for="retail" class="modal-input-label">Retail Price</label>
                        <input type="text" class="modal-input-field form-control" placeholder="Enter Retail Price"
                            id="retail" wire:model='table_product_form.retail' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places.">
                    </div>
                    @error('table_product_form.retail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class=" mt-2">
                        <label for="wholesale" class="modal-input-label">Wholesale price</label>
                        <input type="text" class="modal-input-field form-control" placeholder="Enter Wholesale Price"
                            id="wholesale" wire:model='table_product_form.wholesale' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places.">

                    </div>
                    @error('table_product_form.wholesale')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mt-2">
                        <label for="exp_date" class="modal-input-label">Expiration Date</label>
                        <input type="date" class="modal-input-field form-control" placeholder="Enter Expiration Date"
                            id="exp_date" wire:model='table_product_form.expiration_date'>
                    </div>
                    @error('table_product_form.expiration_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-5" style="font-size: 12px">
                            <i class="fa-sharp fa-solid fa-plus"></i> Add Product</button></button>
                        <button type="button" class="btn btn-outline-secondary px-5" data-bs-dismiss="modal"
                            style="font-size: 12px">Close</button>
                    </div>
                </form>


            </div>



        </div>
    </div>
</div>
