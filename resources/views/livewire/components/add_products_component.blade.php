<div class="container p-3 rounded">
    <div class="row flex-reverse">
        <div class="col-sm p-5 rounded" style="background-color: #c6a4f0;">
            <form wire:submit='addNewProduct'>
                <div class="form-group mt-2">

                    <input wire:model='product_image' type="file" accept="image/png, image/jpg" id="image"
                        class="form-control">
                </div>

                @error('product_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-floating mt-2">
                    <input wire:model='product_name' type="text" class="form-control" placeholder="..."
                        id="name">
                    <label for="name">Product Name</label>
                </div>

                @error('product_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-floating mt-2">
                    <input wire:model='product_qty' type="number" class="form-control" placeholder="..."
                        id="quantity">
                    <label class="text-dark" for="quantity">Quantity</label>
                </div>

                @error('product_qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-floating mt-2">
                    <input wire:model='product_retail_price' type="number" class="form-control" placeholder="..."
                        id="quantity">
                    <label class="text-dark" for="quantity">Retail Price</label>
                </div>

                @error('product_retail_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-floating mt-2">
                    <input wire:model='product_wholesale_price' type="number" class="form-control" placeholder="..."
                        id="quantity">
                    <label class="text-dark" for="quantity">Whole Sale Price</label>
                </div>

                @error('product_wholesale_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group mt-2 ">
                    <label for="Dropdown">Select Class</label> <select class="form-select" wire:model="brand_id">
                        <option value="">Select a brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>

                @error('brand_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group mt-3 text-end">
                    <button type="submit" class="btn btn-danger">Test</button>
                </div>
            </form>
        </div>
        @if ($product_image)
            <div class="col bg-light d-flex flex-column justify-content-center align-items-center">
                <div class="mb-5">Image Preview</div>
                <img class="img-fluid" src="{{ $product_image->temporaryUrl() }}" alt="preview">
            </div>
        @else
            <div class="col bg-light d-flex flex-column justify-content-center align-items-center">
                <div class="mb-5">Image Preview</div>
                <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
        @endif

    </div>
</div>
