<div>
    <div class="p-3 d-flex justify-content-end">
        @if (!$addProduct && !$addBrandMode)
            <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='add_brand_mode_on'>
                <i class="fa fa-plus-circle me-2 text-primary"></i>Add Brand
            </button>
        @else
            <button wire:click='cancel_add_mode' class="btn btn-outline-dark">X</button>
        @endif

        {{-- <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='addProductMode'>
            <i class="fa fa-plus-circle me-2 text-primary"></i>Add Products
        </button> --}}
    </div>

    @if ($addProduct)
        @include('livewire.components.add_products_component')
    @elseif($addBrandMode)
        @include('livewire.components.add_brands_component')
    @else
       @include('livewire.components.brand_cards_component')
    @endif



    @include('livewire.modals.add-brand-modal')


</div>
