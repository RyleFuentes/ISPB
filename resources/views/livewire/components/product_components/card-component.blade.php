


@if ($addProduct)
    @include('livewire.components.product_components.add_products_component')
@elseif($addBrandMode)
    @include('livewire.components.product_components.add_brands_component')

@elseif($view_product_mode)
    @include('livewire.components.product_components.brand_product_table_components')

@elseif($tableMode)
    @include('livewire.components.product_components.table-component')
@else
   @include('livewire.components.product_components.brand_cards_component')
@endif



