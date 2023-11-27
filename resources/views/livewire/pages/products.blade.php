<div >

    @include('livewire.messages.message')
    
    @if ($cardMode === true)
        @include('livewire.components.product_components.card-component')
    
    @elseif($addBrandMode)
        @include('livewire.components.product_components.add_brands_component')
    
    @elseif($tableMode === true)
        @include('livewire.components.product_components.table-component')

    @elseif($view_batch === true)
        @include('livewire.components.product_components.batch-component')

    @elseif($view_product_mode)
        @include('livewire.components.product_components.brand_product_table_components')
    @endif



   

</div>
