<div>
   
    <div class="p-3 d-flex justify-content-end">
        <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='toggle_off'>
            Orders Page
        </button>
        <button class="btn btn-light btn-sm rounded-pill me-2" wire:click='toggle_on'>
            Orders History
        </button>
    </div>
    <div class="container mt-5">
        @if ($change_page == 1)
            @include('livewire.components.order_management_table')
        @else
            @include('livewire.components.order_history_table')
        @endif
    </div>
</div>