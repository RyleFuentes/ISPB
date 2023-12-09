<button class="btn btn-light" wire:click='table_mode'>back</button>

<div class="mt-3 p-5 bg-white shadow-sm rounded fs-40 fw-40">
    @include('livewire.messages.message')
    <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal"
        data-bs-target="#addBrandModal">
        Add Brand
    </button>
    <div class="mt-3 row grid gap-3">
        @foreach ($brands as $brand)
            <div wire:key='{{ $brand->brand_id }}' class="card " style="width: 12rem;">
                <img src="{{ Storage::url($brand->brand_image) }}" class="card-img-top image-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $brand->brand_name }}</h5>
                    <div class="d-flex gap-2">
                        <button wire:click='view_product_list({{ $brand->brand_id }})' type='button'
                            class="btn btn-primary btn-sm">products</button>
                        <button wire:click='delete_brand({{ $brand->brand_id }})' type='button'
                            class="btn btn-secondary btn-sm">X</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    @include('livewire.modals.add_brand_modal')
</div>
