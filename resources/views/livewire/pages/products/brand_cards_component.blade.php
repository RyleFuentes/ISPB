<div class="d-flex justify-content-between mb-2 px-5">
    <button class="btn btn-outline-secondary rounded-3 rounded-3 py-2 px-3 btn-sm" wire:click='table_mode'>
        <i class="fa-sharp fa-solid fa-arrow-left"></i> Go Back
    </button>
    <button class="btn btn-primary rounded-3 py-2 px-3 btn-sm" data-bs-toggle="modal" data-bs-target="#addBrandModal">
        <i class="fa-sharp fa-solid fa-circle-plus"></i> Add Brand
    </button>
</div>

<div class="container-fluid mt-2 px-5 py-2">
    @include('livewire.messages.message')

    <div class="mt-2 row grid gap-3">
        @foreach ($brands as $brand)
            <div wire:key='{{ $brand->brand_id }}' class="card brand-card border">
                <div class="row g-3 mx-auto my-auto">
                    <div class="col-md-4 my-auto">
                        <img src="{{ Storage::url($brand->brand_image) }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title brand-card-title">{{ $brand->brand_name }}</h5>
                            <div class="d-flex gap-2 ">
                                <button wire:click='view_product_list({{ $brand->brand_id }})' type='button'
                                    class="btn btn-primary btn-sm">
                                    <i class="fa-regular fa-eye"></i>Products
                                </button>
                                <button wire:click='delete_brand({{ $brand->brand_id }})' type='button'
                                    class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('livewire.modals.add_brand_modal')
</div>
