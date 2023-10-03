<div>

    <div class="container rounded p-3 " style="background: hsl(0, 0%, 0%, .7)">
        <div class="container-fluid d-flex ">
            <div class="container">

                <form>
                    <div class="form-floating w-50">
                        <input type="text" id="search" class="form-control " placeholder="...">
                        <label for="search">Search</label>
                    </div>
                </form>
            </div>

            <div class="container d-flex align-items-center " style="justify-content: end">
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addBrand"><i
                        class="bi bi-patch-plus-fill"></i> Brands</button>
                <button class="btn btn-outline-light m-2" wire:click='addProductMode'><i
                        class="bi bi-patch-plus-fill"></i> Products</button>
            </div>
        </div>
    </div>

    @if (!$addProduct)
        <div class="container mt-2 rounded " style="height: 100vh; background: hsl(39, 100%, 50%, .3)">
            <div class="container">

                @foreach ($products as $product)
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($product->product_image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Product name: {{$product->product_name}}</p>
                            <p class="card-text">Quantity: {{$product->quantity}}</p>
                            <p class="card-text">Retail Price: {{$product->retail_price}}</p>
                            <p class="card-text">Wholesale Price: {{$product->wholesale_price}}</p>
                            <p class="card-text">Brand: {{optional($product->brand)->brand_name}}.</p>

                            <div>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-warning">Edit</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @include('livewire.components.add_products_component')
    @endif


    @include('livewire.modals.add-brand-modal')

</div>


@push('dismiss-add-brand-script')
    <script>
        window.AddEventListener('hide:add-brand-modal', funciton() {
            $('#addBrand').modal('hide');
        })
    </script>
@endpush
