<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto lg:px-2">
        <div class="overflow-hidden sm:rounded-lg">
            @if ($change_page == 1)
                <div class="p-3 d-flex justify-content-end">

                    <button class="btn btn-primary btn-sm rounded-pill me-2" wire:click='toggle_on'>
                        Orders History
                    </button>
                </div>
                @include('livewire.pages.orders.order_management_table')
            @else
                <div class="p-3 d-flex justify-content-end">
                    
                    <button class="btn btn-primary btn-sm rounded-pill me-2" wire:click='toggle_off'>
                        Orders Page
                    </button>
                </div>

                <livewire:pages.orders.order-history :orders="$orders" />
            @endif
        </div>
    </div>
    @include('livewire.pages.orders.orders-history-generate-report')
</div>
