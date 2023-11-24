<div>
    <div class="p-3 d-flex justify-content-end">
        @if (!$addProduct && !$addBrandMode && !$view_product_mode)
            <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='add_brand_mode_on'>
                <i class="fa fa-plus-circle me-2 text-primary"></i>Add Brand
            </button>
            <button class="btn btn-light rounded-pill me-2 btn-sm">
                <i class="bi bi-table text-primary"></i> Table view</button>
        @else
            <button wire:click='cancel_add_mode' class="btn btn-outline-dark">X</button>
        @endif

        {{-- <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='addProductMode'>
            <i class="fa fa-plus-circle me-2 text-primary"></i>Add Products
        </button> --}}
    </div>

    @if ($addProduct)
        @include('livewire.components.product_components.add_products_component')
    @elseif($addBrandMode)
        @include('livewire.components.product_components.add_brands_component')

    @elseif($view_product_mode)
        @include('livewire.components.product_components.brand_product_table_components')
    @else
       @include('livewire.components.product_components.brand_cards_component')
    @endif



    @include('livewire.modals.add-brand-modal')


</div>
