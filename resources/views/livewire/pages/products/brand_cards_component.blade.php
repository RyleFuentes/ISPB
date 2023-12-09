<button class="btn btn-primary" wire:click='table_mode'>back</button>

<div class="mt-3 p-5 bg-white shadow-sm rounded fs-40 fw-40">
    @include('livewire.messages.message')
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary rounded-3 py-2 px-3 me-2 btn-sm" data-bs-toggle="modal"
            data-bs-target="#addBrandModal">
            <i class="fa-sharp fa-solid fa-circle-plus"></i> Add Brand
        </button>
    </div>
    <div class="mt-3 row grid gap-3">
        @foreach ($brands as $brand)
            <div wire:key='{{ $brand->brand_id }}' class="card brand-card">
                <div class="row g-3 mx-auto my-auto">
                    <div class="col-md-4">
                        <img src="{{ Storage::url($brand->brand_image) }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title brand-card-title">{{ $brand->brand_name }}</h5>
                            <div class="d-flex gap-2 ">
                                <button wire:click='view_product_list({{ $brand->brand_id }})' type='button'
                                    class="btn btn-primary btn-sm">products</button>
                                <button wire:click='delete_brand({{ $brand->brand_id }})' type='button'
                                    class="btn btn-secondary btn-sm">delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('livewire.modals.add_brand_modal')
</div>
