<div class="overflow-auto">
    <div class="container rounded p-3 mt-2" style="background-color: #87814f;">
        <div class="container-fluid d-flex overflow-auto">
            <div class="container">
                <form class="d-flex">
                    <div class="form-floating px-1 w-50">
                        <input type="text" id="search" class="form-control " placeholder="...">
                        <label for="search">Search</label>
                    </div>
                </form>
            </div>

            <div class="container d-flex align-items-center " style="justify-content: end">
                <button class="btn btn-outline-light btn-md" data-bs-toggle="modal" data-bs-target="#addBrand"><i
                        class="bi bi-patch-plus-fill"></i> Brands</button>
                <button class="btn btn-outline-light m-2" wire:click='addProductMode'><i
                        class="bi bi-patch-plus-fill"></i> Products</button>
            </div>
        </div>
    </div>

    @if (!$addProduct)
        <div class="container mt-2 rounded p-2 mb-2" style=" background-color: #f2f3f7">
            <div class="container">
                <div class="row row-cols-lg-3 row-cols-md-2 ">
                    @foreach ($products as $product)
                        <div class="col d-flex justify-content-around">
                            <div class="card m-1" style="width: 14rem;">
                                <img src="{{Storage::url($product->product_image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Product name: {{$product->product_name}}</p>
                                    <p class="card-text">Quantity: {{$product->quantity}}</p>
                                    <p class="card-text">Retail Price: {{$product->retail_price}}</p>
                                    <p class="card-text">Wholesale Price: {{$product->wholesale_price}}</p>
                                    <p class="card-text">Brand: {{optional($product->brand)->brand_name}}.</p>

                                    <div>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        @include('livewire.components.add_products_component')
    @endif


    @include('livewire.modals.add-brand-modal')

</div>


@push('dismiss-add-brand-script')
    <script>
        window.AddEventListener('hide:add-brand-modal', function() {
            $('#addBrand').modal('hide');
        })
    </script>
@endpush
