<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            @include('livewire.messages.message')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductLabel">ADD NEW PRODUCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='add_product'>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="product_name"
                            wire:model='product_form.prod_name'>
                        <label for="product_name">Product Name</label>
                    </div>
                    @error('product_form.prod_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="number" class="form-control" placeholder="..." id="quantity"
                            wire:model='product_form.quantity'>
                        <label for="quantity">Quantity</label>
                    </div>
                    @error('product_form.quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="kilo"
                            wire:model='product_form.kilo' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places.">
                        <label for="kilo">Kilo</label>
                    </div>
                    @error('product_form.kilo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror



                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="retail"
                            wire:model='product_form.retail_price' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places.">
                        <label for="retail">Retail Price</label>
                    </div>
                    @error('product_form.retail_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" placeholder="..." id="wholesale"
                            wire:model='product_form.wholesale_price' pattern="^\d+(\.\d{1,2})?$"
                            title="Please enter a valid number with up to two decimal places.">
                        <label for="wholesale">Wholesale price</label>
                    </div>
                    @error('product_form.wholesale_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-floating mt-2">
                        <input type="date" class="form-control" placeholder="..." id="exp_date"
                            wire:model='product_form.expiration_date'>
                        <label for="exp_date">Expiration Date</label>
                    </div>
                    @error('product_form.wholesale_price')
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
