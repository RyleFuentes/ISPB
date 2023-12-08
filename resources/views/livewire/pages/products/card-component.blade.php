


@if ($addProduct)
    @include('livewire.pages.products.add_products_component')
@elseif($addBrandMode)
    @include('livewire.pages.products.add_brands_component')

@elseif($view_product_mode)
    @include('livewire.pages.products.brand_product_table_components')

@elseif($tableMode)
    @include('livewire.pages.products.table-component')
@else
   @include('livewire.pages.products.brand_cards_component')
@endif



