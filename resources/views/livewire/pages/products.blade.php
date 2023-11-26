<div >

    @include('livewire.messages.message')
    
    @if ($cardMode === true)
        @include('livewire.components.product_components.card-component')
    
    @elseif($tableMode === true)
        @include('livewire.components.product_components.table-component')

    @elseif($view_batch === true)
        @include('livewire.components.product_components.batch-component')
    @endif



   

</div>
