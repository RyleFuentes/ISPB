<div >

    @include('livewire.messages.message')
    
    @if ($cardMode === true)
        @include('livewire.components.product_components.card-component')
    
    @elseif($tableMode === true)
        @include('livewire.components.product_components.table-component')
    @endif



   

</div>
