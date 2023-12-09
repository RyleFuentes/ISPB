<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div>
        @include('livewire.messages.message')

        @if ($cardMode === true)
            @include('livewire.pages.products.card-component')
        @elseif($addBrandMode)
            @include('livewire.pages.products.add_brands_component')
        @elseif($tableMode === true)
            @include('livewire.pages.products.table-component')
        @elseif($view_batch === true)
            @include('livewire.pages.products.batch-component')
        @elseif($view_product_mode)
            @include('livewire.pages.products.brand_product_table_components')
        @endif
    </div>
</div>
